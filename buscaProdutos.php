<?php
include_once 'conexaoDatabase.php';

header('Content-Type: application/json');

$termo    = $_GET['termo']   ?? '';
$empresa  = $_GET['empresa'] ?? '';

if (strlen($termo) < 2 || empty($empresa)) {
  echo json_encode([]);
  exit;
}

// Sanitize
$termo   = mysqli_real_escape_string($conexao, $termo);
$empresa = mysqli_real_escape_string($conexao, $empresa);

// Ajuste na consulta com filtro da empresa
$sql = "SELECT nomeProduto FROM produto
        WHERE nomeProduto LIKE '%$termo%'
        AND empresa = '$empresa'
        LIMIT 10";

$result = mysqli_query($conexao, $sql);

$produtos = [];
while ($row = mysqli_fetch_assoc($result)) {
  $produtos[] = $row['nomeProduto'];
}

echo json_encode($produtos);
