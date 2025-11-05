<?php
// registro
$nome = trim($_POST['nome'] ?? '');
$email = strtolower(trim($_POST['email'] ?? ''));
$senha = $_POST['senha'] ?? '';
$senha2 = $_POST['senha2'] ?? '';

if (!$nome || !$email || !$senha || !$senha2) {
    $_SESSION['flash'] = 'Preencha todos os campos.';
    header('Location: index.php?page=register');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['flash'] = 'Email inválido.';
    header('Location: index.php?page=register');
    exit;
}

if ($senha !== $senha2) {
    $_SESSION['flash'] = 'As senhas não conferem.';
    header('Location: index.php?page=register');
    exit;
}

if (strlen($senha) < 6) {
    $_SESSION['flash'] = 'A senha deve ter pelo menos 6 caracteres.';
    header('Location: index.php?page=register');
    exit;
}

// checar existência
$stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
$stmt->execute([$email]);
if ($stmt->fetch()) {
    $_SESSION['flash'] = 'Email já cadastrado.';
    header('Location: index.php?page=register');
    exit;
}

$hash = password_hash($senha, PASSWORD_DEFAULT);
$stmt = $pdo->prepare('INSERT INTO users (nome, email, senha) VALUES (?, ?, ?)');
$stmt->execute([$nome, $email, $hash]);

$_SESSION['flash'] = 'Cadastro realizado. Faça login.';
header('Location: index.php?page=login');
exit;