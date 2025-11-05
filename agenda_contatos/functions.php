<?php
// helpers simples
function is_logged() {
    return isset($_SESSION['user_id']);
}
function current_user($pdo) {
    if (!is_logged()) return null;
    $stmt = $pdo->prepare('SELECT id, nome, email FROM users WHERE id = ?');
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}