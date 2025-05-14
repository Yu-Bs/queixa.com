<?php

$conn = new mysqli("localhost", "usuario", "senha", "sua_base");

if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

$termo = $_GET['termo'] ?? '';
$termo = "%" . $conn->real_escape_string($termo) . "%";

$stmt = $conn->prepare("SELECT nome FROM produtos WHERE nomeProduto LIKE '%$termo%' LIMIT 10");
$stmt->bind_param("s", $termo);
$stmt->execute();

$result = $stmt->get_result();
$produtos = [];

while ($row = $result->fetch_assoc()) {
  $produtos[] = $row;
}

echo json_encode($produtos);
?>
