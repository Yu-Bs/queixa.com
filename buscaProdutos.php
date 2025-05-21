<?php
include_once 'conexaoDatabase.php';

header('Content-Type: application/json');

$termo = $_GET['termo'] ?? '';
$empresa = $_GET['empresaSelecionada'] ?? '';

if (strlen($termo) < 2 || empty($empresa)) {
  echo json_encode([]);
  exit;
}

$sql = "SELECT nomeProduto FROM produto 
        WHERE nomeProduto LIKE CONCAT('%', ?, '%') 
        AND empresa = ? 
        LIMIT 10";

$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "ss", $termo, $empresa);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$produtos = [];

while ($row = mysqli_fetch_assoc($result)) {
  $produtos[] = $row['nomeProduto'];
}

echo json_encode($produtos);
