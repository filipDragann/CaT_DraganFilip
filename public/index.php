<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require_once __DIR__ . '/../config/db.php';

$route = $_GET['route'] ?? '';
$route = trim($route, '/');
$route = htmlspecialchars($route, ENT_QUOTES, 'UTF-8');

$routes = [
    ''          => '../src/views/home.php',
    'camping'   => '../src/views/camping_list.php',
    'rezervari' => '../src/views/reservations.php',
    'login'     => '../src/views/login.php',
    'admin'     => '../admin/dashboard.php',
];

$view = $routes[$route] ?? '../src/views/404.php';
require_once $view;