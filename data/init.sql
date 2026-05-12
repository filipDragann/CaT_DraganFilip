cat > data/init.sql << 'EOF'
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL, 
    email TEXT UNIQUE NOT NULL,
    password_hash TEXT,
    oauth_provider TEXT,
    oauth_id TEXT,
    role TEXT DEFAULT 'user', -- user sau admin
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS camping_spots (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    description TEXT,
    location TEXT,
    lat REAL,
    lng REAL,
    price_per_night REAL,
    capacity INTEGER,
    amenities TEXT, -- JSON
    images TEXT,    -- JSON array de pahts
    created_by INTEGER REFERENCES user(id),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reservations (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER REFERENCES user(id),
    spot_id INTEGER REFERENCES camping_spots(id),
    check_in DATE NOT NULL,
    check_out DATE NOT NULL,
    guests INTEGER DEFAULT 1,
    status TEXT DEFAULT 'pending', 
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER REFERENCES user(id),
    spot_id INTEGER REFERENCES camping_spots(id),
    rating INTEGER CHECK(rating BETWEEN 1 AND 5),
    commment TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS media (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    spot_id INTEGER REFERENCES camping_spot(id),
    user_id INTEGER REFERENCES users(id),
    type TEXT, -- 'photo' sau 'audio' sau 'video'
    path TEXT NOT NULL,
    created_at DATE DEFAULT CURRENT_TIMESTAMP
);
