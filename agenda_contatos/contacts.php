<?php
$action = $_POST['action'] ?? $_GET['action'] ?? '';

// create
if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');
    $observacoes = trim($_POST['observacoes'] ?? '');

    if ($nome === '') {
        $_SESSION['flash'] = 'Nome é obrigatório.';
        header('Location: index.php?page=contacts');
        exit;
    }

    $stmt = $pdo->prepare('INSERT INTO contatos (user_id, nome, telefone, email, endereco, observacoes) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$_SESSION['user_id'], $nome, $telefone, $email, $endereco, $observacoes]);
    header('Location: index.php?page=contacts');
    exit;
}

// edit (mostrar formulário)
if ($action === 'edit') {
    $id = intval($_GET['id'] ?? 0);
    $stmt = $pdo->prepare('SELECT * FROM contatos WHERE id = ? AND user_id = ?');
    $stmt->execute([$id, $_SESSION['user_id']]);
    $contato = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$contato) {
        $_SESSION['flash'] = 'Contato não encontrado.';
        header('Location: index.php?page=contacts');
        exit;
    }

    include __DIR__ . '/views/contact_edit.php';
    exit;
}

// update (salvar alterações)
if ($action === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id'] ?? 0);
    $nome = trim($_POST['nome'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');
    $observacoes = trim($_POST['observacoes'] ?? '');

    if ($nome === '') {
        $_SESSION['flash'] = 'Nome é obrigatório.';
        header('Location: index.php?page=contacts&action=edit&id=' . $id);
        exit;
    }
    
    $stmt = $pdo->prepare('UPDATE contatos SET nome=?, telefone=?, email=?, endereco=?, observacoes=? WHERE id=? AND user_id=?');
    $stmt->execute([$nome, $telefone, $email, $endereco, $observacoes, $id, $_SESSION['user_id']]);

    $_SESSION['flash'] = 'Contato atualizado com sucesso.';
    header('Location: index.php?page=contacts');
    exit;
}

// delete
if ($action === 'delete') {
    $id = intval($_GET['id'] ?? 0);
    $stmt = $pdo->prepare('DELETE FROM contatos WHERE id = ? AND user_id = ?');
    $stmt->execute([$id, $_SESSION['user_id']]);
    $_SESSION['flash'] = 'Contato excluído com sucesso.';
    header('Location: index.php?page=contacts');
    exit;
}

// listar
$search = trim($_GET['q'] ?? '');

if ($search !== '') {
    // Pesquisa por nome, telefone ou email
    $like = '%' . $search . '%';
    $stmt = $pdo->prepare('SELECT * FROM contatos 
        WHERE user_id = ? 
        AND (nome LIKE ? OR telefone LIKE ? OR email LIKE ?)
        ORDER BY created_at DESC');
    $stmt->execute([$_SESSION['user_id'], $like, $like, $like]);
} else {
    // Sem filtro, lista todos
    $stmt = $pdo->prepare('SELECT * FROM contatos WHERE user_id = ? ORDER BY created_at DESC');
    $stmt->execute([$_SESSION['user_id']]);
}

$contatos = $stmt->fetchAll(PDO::FETCH_ASSOC);
include __DIR__ . '/views/contacts.php';