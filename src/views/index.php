<?php
session_start();
require_once __DIR__ . '/../config/db.php';

$route = $_GET['route'] ?? '';
$route = trim($route,'/');

$route = htmlspecialchars($route, ENT_QUOTES, 'UTF-8');

$routes = [
    ''              => '../src/views/home.php',
    'camping'       => '../src/views/camping_list.php',
    'camping/spot'  => '../src/views/camping_detail.php',
    'rezervari'     => '../src/views/reservations.php',
    'login'         => '../src/views/login.php',
    'register'      => '../src/views/register.php',
    'admin'         => '../src/views/admin.php', 
];

$view = $routes[$route] ?? '../src/views/404.php';

require_once $view;