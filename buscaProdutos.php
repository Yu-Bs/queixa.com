<?php
include_once 'conexaoDatabase.php';

header('Content-Type: application/json');
$termo = $_GET['termo'] ?? '';

if (strlen($termo) < 2) {
  echo json_encode([]);
  exit;
}

$termo = mysqli_real_escape_string($conexao, $termo);
$sql = "SELECT nomeProduto FROM produto WHERE nomeProduto LIKE '%$termo%' LIMIT 10";
$result = mysqli_query($conexao, $sql);

$produtos = [];
while ($row = mysqli_fetch_assoc($result)) {
  $empresas[] = $row['nomeProduto'];
}

echo json_encode($produtos);