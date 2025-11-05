<?php
require_once __DIR__ . '/config.php';

// simples roteamento via ?page=
$page = $_GET['page'] ?? 'home';

// require controllers (basic)
require_once __DIR__ . '/functions.php';

if ($page === 'register') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require __DIR__ . '/auth_register.php';
    } else {
        include __DIR__ . '/views/register.php';
    }
    exit;
}

if ($page === 'login') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require __DIR__ . '/auth_login.php';
    } else {
        include __DIR__ . '/views/login.php';
    }
    exit;
}

if ($page === 'logout') {
    session_destroy();
    header('Location: index.php');
    exit;
}

// rotas que requerem autenticação
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=login');
    exit;
}

if ($page === 'contacts') {
    require __DIR__ . '/contacts.php';
    exit;
}

if ($page === 'export') {
    require __DIR__ . '/export_csv.php';
    exit;
}

include __DIR__ . '/views/home.php';