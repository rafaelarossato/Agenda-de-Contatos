<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Agenda de Contatos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="public/assets/style.css?v=1.0">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="index.php"><i class="bi bi-people-fill me-2"></i><strong>Agenda</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php?page=home">Home</a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php?page=contacts">Contatos</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?page=logout">Sair</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container my-4">
<?php if(!empty($_SESSION['flash'])): ?>
  <div class="alert alert-info alert-dismissible fade show" role="alert">
    <?= htmlspecialchars($_SESSION['flash']) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php unset($_SESSION['flash']); endif; ?>
<?php if(isset($_SESSION['user_id'])): ?>
  <span class="me-2">Olá, <?= e($_SESSION['user_nome']) ?>!</span>
<?php endif; ?>