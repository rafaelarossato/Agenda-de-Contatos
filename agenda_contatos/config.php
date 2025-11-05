<?php
$DB_HOST = 'localhost';
$DB_NAME = 'agenda_web2';
$DB_USER = 'root';
$DB_PASS = 'root';

try {
    $pdo = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME};charset=utf8mb4", $DB_USER, $DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
}
session_start();
function e($str){ return htmlspecialchars($str, ENT_QUOTES, 'UTF-8'); }
?>