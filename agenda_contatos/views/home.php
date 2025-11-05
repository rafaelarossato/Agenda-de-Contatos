<?php include __DIR__ . '/header.php'; ?>
<div class="p-4 bg-white rounded shadow-sm">
  <h1>Bem-vindo à Agenda de Contatos</h1>
  <p>Gerencie seus contatos de forma simples e segura.</p>
  <?php if(isset($_SESSION['user_id'])): ?>
    <a class="btn btn-primary" href="index.php?page=contacts">Ir para meus contatos</a>
  <?php else: ?>
    <a class="btn btn-primary" href="index.php?page=login">Entrar</a>
  <?php endif; ?>
</div>
<?php include __DIR__ . '/footer.php'; ?>