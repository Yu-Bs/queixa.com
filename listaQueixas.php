<?php
// Consulta para puxar as queixas da empresa atual (idEmpresaConsulta)
$queryQueixas = "
    SELECT u.nomeUsuario, q.nota, q.descricao, q.dataAvalicao
    FROM queixas q
    JOIN usuarios u ON q.idUsuario = u.idUsuario
    WHERE q.idEmpresa = $idEmpresaConsulta
    ORDER BY q.dataAvalicao DESC
    LIMIT 10
";

$resultQueixas = $conexao->query($queryQueixas);

if ($resultQueixas && $resultQueixas->num_rows > 0) {
    while ($row = $resultQueixas->fetch_assoc()) {
        echo '<div class="queixa mb-3">';
        echo '<strong>' . htmlspecialchars($row['nomeUsuario']) . '</strong> ';
        echo '(' . number_format($row['nota'], 1) . '/10): ';
        echo htmlspecialchars($row['descricao']) . '<br>';
        echo '<small class="text-muted">' . date('d/m/Y', strtotime($row['dataAvalicao'])) . '</small>';
        echo '</div>';
    }
} else {
    echo '<p>Não há queixas para esta empresa.</p>';
}
?>