<?php include __DIR__ . '/header.php'; ?>

<!-- Formulário de pesquisa -->
<form method="get" action="index.php" class="d-flex justify-content-between align-items-center mb-3">
<h2>Meus Contatos</h2>
  <input type="hidden" name="page" value="contacts">
  <div class="d-flex gap-2">
    <input type="text" name="q" class="form-control form-control-sm" placeholder="Buscar por nome, telefone ou email">
    <button class="btn btn-sm btn-outline-secondary" title="Alternar visual"><i class="bi bi-grid-3x3-gap-fill"></i></button>
  </div>
</form>

<!--  Formulário de criação -->
<div class="mb-3">
  <form class="row g-2" method="post" action="index.php?page=contacts">
    <input type="hidden" name="action" value="create">
    <div class="col-md-3"><input class="form-control" name="nome" placeholder="Nome" required></div>
    <div class="col-md-2"><input class="form-control" name="telefone" pattern="\d{11}" placeholder="Telefone (11 dígitos)" required></div>
    <div class="col-md-2"><input class="form-control" name="email" type="email" placeholder="Email" required></div>
    <div class="col-md-3"><input class="form-control" name="endereco" placeholder="Endereço"></div>
    <div class="col-md-2"><button class="btn btn-primary w-100" type="submit">Adicionar</button></div>
  </form>
</div>

<div class="mb-2">
  <a class="btn btn-sm btn-outline-secondary" href="index.php?page=export">Exportar CSV</a>
</div>

<!-- Tabela de contatos -->
<div id="tableView">
  <table class="table table-striped table-hover" id="contactsTable">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Endereço</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($contatos as $c): ?>
      <tr class="contact-row">
        <td class="name"><?= htmlspecialchars($c['nome']) ?></td>
        <td class="phone"><?= htmlspecialchars($c['telefone']) ?></td>
        <td class="email"><?= htmlspecialchars($c['email']) ?></td>
        <td class="address"><?= htmlspecialchars($c['endereco']) ?></td>
        <td class="text-end">
          <a class="btn btn-sm btn-outline-secondary" href="index.php?page=contacts&action=edit&id=<?= $c['id'] ?>">Editar</a>
          <a class="btn btn-sm btn-outline-danger btn-delete" href="index.php?page=contacts&action=delete&id=<?= $c['id'] ?>">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php include __DIR__ . '/footer.php'; ?>

<!-- Modal de Confirmação de Exclusão -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="confirmDeleteLabel">Excluir Contato</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        Tem certeza de que deseja excluir este contato?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a id="confirmDeleteBtn" href="#" class="btn btn-danger">Excluir</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS (se ainda não estiver no header.php) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const deleteButtons = document.querySelectorAll('.btn-delete');
  const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
  const modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));

  deleteButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const href = btn.getAttribute('href');
      confirmDeleteBtn.setAttribute('href', href);
      modal.show();
    });
  });
});
</script>