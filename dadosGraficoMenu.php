<?php
include_once './conexaoDatabase.php';

// Consulta: contar queixas por categoria
$sql = "SELECT nomeCategAvaliacao AS categoria, COUNT(*) AS total
        FROM avaliacao
        INNER JOIN categAvaliacao ON avaliacao.idCategAvaliacao = categAvaliacao.idCategAvaliacao
        GROUP BY nomeCategAvaliacao";

$result = $conexao->query($sql);



// Formata os dados para o Google Charts
$data = [];
$data[] = ['Categoria', 'Quantidade'];

// Adiciona os dados ao array
while ($row = $result->fetch_assoc()) {
    $data[] = [$row['categoria'], (int)$row['total']];
}

// Retorna em JSON
echo json_encode($data);

?>