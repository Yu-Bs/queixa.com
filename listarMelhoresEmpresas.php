<?php
include_once './conexaoDatabase.php';

// Consulta: listar as 5 melhores empresas
// A função medEmpresa(idEmpresa) deve retornar a média das notas da empresa
$query = "SELECT idEmpresa,nomeEmpresa, medEmpresa(idEmpresa) AS notaMedia FROM empresa
WHERE medEmpresa(idEmpresa) IS NOT NULL 
ORDER BY notaMedia DESC LIMIT 5";

// Executa a consulta
$result = $conexao->query($query);



while ($row = $result->fetch_assoc()) {
    echo '<div class="d-flex align-items-center justify-content-between bg-custom-gray p-2 mb-2 rounded div-empresa">';
    echo '  <span class="mx-4 text-start flex-grow-1">' . htmlspecialchars($row['nomeEmpresa']) . '</span>';
    echo '  <span><strong>' . number_format($row['notaMedia'], 1) . '/10</strong></span>';
    echo '</div>';
}



?>