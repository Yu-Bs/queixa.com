<?php
session_start();
include 'conexaoDatabase.php';

if (!isset($_GET['idEmpresa']) && isset($_SESSION['idEmpresa'])) {
    $idEmpresa = $_SESSION['idEmpresa'];

    $sql = "SELECT * FROM empresa WHERE idEmpresa = $idEmpresa";
    $resultado = mysqli_query($conn, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $dadosEmpresa = mysqli_fetch_assoc($resultado);
    } else {
        echo "Empresa não encontrada.";
        exit;
    }

} else if (isset($_GET['nomeEmpresa'])) {
    $nomeEmpresaPesquisada = mysqli_real_escape_string($conn, $_GET['nomeEmpresa']);

    $sql = "SELECT * FROM empresa WHERE nomeEmpresa = '$nomeEmpresaPesquisada'";
    $resultado = mysqli_query($conn, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $dadosEmpresa = mysqli_fetch_assoc($resultado);
    } else {
        echo "Empresa pesquisada não encontrada.";
        exit;
    }

} else {
    echo "Nenhuma empresa especificada.";
    exit;
}
?>
