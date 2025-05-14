<?php
include_once './conexaoDatabase.php';

// Consulta: Quantidade de empresa por setor
$sql = "SELECT setor.nomeSetor, count(idEmpresa) AS qtd_emp_setor FROM setor, empresa
WHERE empresa.idSetor = setor.idSetor
GROUP BY setor.idSetor";

// Consulta: contar queixas por categoria
//SELECT nomeCategAvaliacao AS categoria, COUNT(*) AS total
//FROM avaliacao
//INNER JOIN categAvaliacao ON avaliacao.idCategAvaliacao = categAvaliacao.idCategAvaliacao
//GROUP BY nomeCategAvaliacao"

$result = $conexao->query($sql);



// Formata os dados para o Google Charts
$data = [];
$data[] = ['nomeSetor', 'qtd_emp_setor'];

// Adiciona os dados ao array
while ($row = $result->fetch_assoc()) {
    $data[] = [$row['nomeSetor'], (int)$row['qtd_emp_setor']];
}

// Retorna em JSON
echo json_encode($data);

?>