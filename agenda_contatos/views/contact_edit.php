<?php include __DIR__ . '/header.php'; ?>
<h2>Editar Contato</h2>
<form method="post" action="index.php?page=contacts">
  <input type="hidden" name="action" value="update">
  <input type="hidden" name="id" value="<?= e($contato['id']) ?>">

  <div class="mb-2">
    <label>Nome</label>
    <input class="form-control" name="nome" value="<?= e($contato['nome']) ?>" required>
  </div>
  <div class="mb-2">
    <label>Telefone</label>
    <input class="form-control" name="telefone" value="<?= e($contato['telefone']) ?>">
  </div>
  <div class="mb-2">
    <label>Email</label>
    <input class="form-control" name="email" value="<?= e($contato['email']) ?>">
  </div>
  <div class="mb-2">
    <label>Endereço</label>
    <input class="form-control" name="endereco" value="<?= e($contato['endereco']) ?>">
  </div>
  <div class="mb-2">
    <label>Observações</label>
    <textarea class="form-control" name="observacoes"><?= e($contato['observacoes']) ?></textarea>
  </div>
  
  <button class="btn btn-primary">Salvar alterações</button>
  <a href="index.php?page=contacts" class="btn btn-secondary">Cancelar</a>
</form>
<?php include __DIR__ . '/footer.php'; ?>