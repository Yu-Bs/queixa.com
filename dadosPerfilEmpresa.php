<?php

include_once 'conexaoDatabase.php';
include_once 'empresa.php';
session_start();


if (isset($_GET['nomeEmpresa'])) {
    $nomeEmpresaPesquisada = mysqli_real_escape_string($conexao, $_GET['nomeEmpresa']);

    $sql = "SELECT * FROM empresa WHERE nomeEmpresa LIKE '%$nomeEmpresaPesquisada%'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $dadosEmpresa = mysqli_fetch_assoc($resultado);
    } else {
        echo "Empresa pesquisada não encontrada.";
        exit;
    }

    // Empresa pesquisada
} else if (!isset($_GET['idEmpresa']) && isset($_SESSION['user'])) {
    $idEmpresa = $_SESSION['user']->idEmpresa;

    $sql = "SELECT * FROM empresa WHERE idEmpresa = $idEmpresa";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $dadosEmpresa = mysqli_fetch_assoc($resultado);
    } else {
        echo "Empresa não encontrada.";
        exit;
    }

} else {
    echo "Nenhuma empresa especificada.";
    exit;
}
