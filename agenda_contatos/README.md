# agenda_contatos

Projeto simples de Agenda de Contatos (PHP + MySQL) — versão simplificada.

**Como usar**
1. Coloque a pasta `agenda_contatos` dentro da pasta `www`/`htdocs` do seu servidor (XAMPP/WAMP).
2. Abra o Xampp Control e inicialize o Apache e o MySQL.
3. Importe o arquivo `sql/database.sql` no seu MySQL.
4. Ajuste as credenciais em `config.php`.
5. Acesse `http://localhost/agenda_contatos` no navegador.

**Funcionalidades**
- Registro e login de usuário.
- CRUD de contatos (nome, telefone, email, endereço, observações).
- Relatório em CSV (exportar contatos do usuário).
- Proteções básicas: prepared statements (PDO), password_hash, escape para XSS.
