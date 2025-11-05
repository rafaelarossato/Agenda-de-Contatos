<?php
// exporta CSV com contatos do usuário
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=contatos.csv');
$output = fopen('php://output', 'w');
fputcsv($output, ['id','nome','telefone','email','endereco','observacoes','created_at']);
$stmt = $pdo->prepare('SELECT * FROM contatos WHERE user_id = ? ORDER BY created_at DESC');
$stmt->execute([$_SESSION['user_id']]);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, [$row['id'], $row['nome'], $row['telefone'], $row['email'], $row['endereco'], $row['observacoes'], $row['created_at']]);
}
fclose($output);
exit;