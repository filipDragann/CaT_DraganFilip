<?php
class AuthController {
    
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function login(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processLogin();
        } else {
            require_once __DIR__ .'/../views/login.php';
        }
    }

    public funtion register(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processRegister();
        } else {
            require_once __DIR__ .'/../views/register.php';
        }
    }

    private function processLogin(): void {
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if(empty($email) || empty($password)) {
            $error = "Completeaza toate campurile.";
            require_once __DIR__ .'/../views/login.php';
            return;
        }

        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($password, $user['password'])) {
            $error = "Email sau parola sunt gresite";
            require_once __DIR__ ."/../views/login.php";
            return;
        }


        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name']    = $user['name'];
        $_SESSION['role']    = $user['role'];

        header('Location: /camping-app/public');
        exit;


    }

    private function processRegister(): void {
        $name                = trim($_POST['name'] ?? '');
        $email               = trim($_POST['email'] ?? '');
        $password            = trim($_POST['password'] ?? '');
        $password_confirm    = trim($_POST['password_confirm'] ?? '');


        if(empty($name) || empty($email) || empty($password)) {
            $error = "Sunt campuri necompletate";
            require_once __DIR__ .'/../views/register.php';
            return;
        }

        if(strlen($password) < 8){
            $error = 'Parola contine prea putine caractere';
            require_once __DIR__ .'/../views/register.php';
            return;
        }

        $stmt = $this->db->prepare('SELECT id FROM users WHERE email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $error = 'Extista deja un cont cu aceast email';
            require_once __DIR__ .'/../views/register.php';
            return;
        }
        
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare(
            'INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)'
        );
        $stmt->execute([$name, $email, $hash]);


        $_SESSION['user_id'] = $this->db->lastInsertId();
        $_SESSION['name']    = $name;
        $_SESSION['role']    = 'user';
        
        header('Location: /camping-app/public/');

        exit;

        public function logout(): void {
            session_destroy();
            header('Location: /camping-app/piblic/');
            exit;
        }


}