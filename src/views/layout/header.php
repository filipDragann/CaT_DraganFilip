<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Camping App') ?></title>
    <link rel="stylesheet" href="/camping-app/public/assets/css/style.css">

</head>
<body>
<nav>
    <a href="/camping-app/public">Home</a>
    <a href="/camping-app/public/camping">Camping places</a>
    <?php if (isset($_SESSION['user_id '])) : ?>
        <a href="/camping-app/rezervari">Reservations</a>
        <?php if ($_SESSION['role'] == 'admin') : ?>
            <a href ="/camping-app/public/admin">Admin</a>
        <?php endif; ?>
        <a href ="/camping-app/public/logout">Logout</a>
    <?php else : ?>
        <a href ="/camping-app/public/login">Login</a>
    <?php endif; ?>
</nav>




