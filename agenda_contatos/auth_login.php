<?php
$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';

if (!$email || !$senha) {
    $_SESSION['flash'] = 'Preencha email e senha.';
    header('Location: index.php?page=login');
    exit;
}

$stmt = $pdo->prepare('SELECT id, nome, senha FROM users WHERE email = ?');
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || !password_verify($senha, $user['senha'])) {
    $_SESSION['flash'] = 'Credenciais inválidas.';
    header('Location: index.php?page=login');
    exit;
}

// Salva mais informações na sessão
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_nome'] = $user['nome'];

$_SESSION['flash'] = 'Login realizado com sucesso!';
header('Location: index.php');
exit;