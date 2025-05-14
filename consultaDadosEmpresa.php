<?php
include_once './conexaoDatabase.php';

$empresa = null;
$isEmpresaPesquisada = false; 

// Verifica se veio da pesquisa
if (isset($_GET['empresa'])) {
    $nomeEmpresa = $_GET['empresa'];

    // Consulta a empresa no banco de dados
    $sql = "SELECT * FROM empresa WHERE nomeEmpresa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nomeEmpresa);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $empresa = $resultado->fetch_assoc();// Dados da empresa pesquisada
        $isEmpresaPesquisada = true; // Indica que a empresa foi pesquisada
    } else {
        echo "Empresa não encontrada.";
        exit;
    }

} elseif (isset($_SESSION['user'])) {
    // Consulta os dados completos da empresa logada no banco
    $idEmpresaLogada = $_SESSION['user']['id']; // ID da empresa logada
    $isEmpresaPesquisada = false; 
    $sql = "SELECT * FROM empresa WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idEmpresaLogada);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $empresa = $resultado->fetch_assoc(); // Dados da empresa logada
    } else {
        echo "Empresa logada não encontrada.";
        exit;
    }
}
// Faz a consulta para pegar a média de notas da empresa
$idEmpresa = $empresa['idEmpresa'];
$sqlNota = "SELECT AVG(nota) AS mediaNota FROM avaliacao WHERE idEmpresa = ?";
$stmtNota = $conn->prepare($sqlNota);
$stmtNota->bind_param("i", $idEmpresa);
$stmtNota->execute();
$resultadoNota = $stmtNota->get_result();

if ($resultadoNota->num_rows > 0) {
    $rowNota = $resultadoNota->fetch_assoc();
    $mediaNota = $rowNota['mediaNota'] ?? 0;
}
?>


