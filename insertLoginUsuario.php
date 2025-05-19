<?php
include 'conexaoDatabase.php'; 

header('Content-type: application/json');

$sql = "INSERT INTO usuario (nomeUsuario, senhaUsuario, email) VALUES ('"
        .$_POST['nomeUsuario']."', '".$_POST['senhaUsuario']."', '".$_POST['email']."')";
        

if ($conexao->query($sql) === TRUE) {
    $conexao->close();
    //$msg = "Usuário criado com sucesso!";
    header("Location: loginUsuario.php");
    exit;
} else {
    //$msg = "Error: ". $sql . "<br>". $conexao->error;
    $conexao->close();
    header("Location: cadastroUsuario.php");
    exit;
}
    


//echo json_encode(['msg' => $msg]);
?>
