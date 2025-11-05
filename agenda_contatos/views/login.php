<?php include __DIR__ . '/header.php'; ?>
<h2>Login</h2>

<?php 
if (!empty($_SESSION['flash'])) { 
  echo '<div class="alert alert-warning">'.e($_SESSION['flash']).'</div>'; 
  unset($_SESSION['flash']); 
} 
?>

<form method="post" action="index.php?page=login" class="mb-3">
  <div class="mb-2">
    <input class="form-control" name="email" type="email" placeholder="Email" required>
  </div>
  <div class="mb-2">
    <input class="form-control" name="senha" type="password" placeholder="Senha" required>
  </div>
  <button class="btn btn-primary w-100">Entrar</button>
</form>

<!-- Área para novos usuários -->
<div class="text-center mt-3">
  <p>Ainda não tem uma conta?</p>
  <a href="index.php?page=register" class="btn btn-outline-success">Cadastrar-se</a>
</div>

<?php include __DIR__ . '/footer.php'; ?>
