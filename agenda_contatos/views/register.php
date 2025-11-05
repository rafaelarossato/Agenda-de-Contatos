<?php include __DIR__ . '/header.php'; ?>
<h2>Criar nova conta</h2>

<?php 
if (!empty($_SESSION['flash'])) {
    echo '<div class="alert alert-warning">'.e($_SESSION['flash']).'</div>'; 
    unset($_SESSION['flash']); 
} 
?>

<form method="post" action="index.php?page=register" class="mb-3">
  <div class="mb-2">
    <input class="form-control" name="nome" placeholder="Nome completo" required>
  </div>

  <div class="mb-2">
    <input class="form-control" name="email" type="email" placeholder="Email" required>
  </div>

  <div class="mb-2">
    <input class="form-control" name="senha" type="password" placeholder="Senha (mínimo 6 caracteres)" minlength="6" required>
  </div>

  <!-- Campo de confirmação de senha -->
  <div class="mb-3">
    <input class="form-control" name="senha2" type="password" placeholder="Confirmar senha" minlength="6" required>
  </div>

  <button class="btn btn-success w-100">Registrar</button>
</form>

<!-- Link para login -->
<div class="text-center mt-3">
  <p>Já possui uma conta?</p>
  <a href="index.php?page=login" class="btn btn-outline-primary">Fazer login</a>
</div>

<?php include __DIR__ . '/footer.php'; ?>