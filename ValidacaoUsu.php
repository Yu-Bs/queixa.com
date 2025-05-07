<?php 
include_once './conexaoDatabase.php';
include_once './usuario.php';

$classe = isset($_GET["classe"])?$_GET["classe"]:"";

session_start();
if(isset($_POST['usuario'])){
    $usuario = $_POST ['usuario'];
    $senhaUsuario= $_POST['senhaUsuario'];


    $consulta= mysqli_query($conexao, "select idUsuario, nomeUsuario, email, senhaUsuario from usuario where email='".$usuario."'");
    $dados= mysqli_fetch_assoc($consulta);
    $user= null;
    if($dados!= null){
        $user= new Usuario($dados["idUsuario"], $dados["nomeUsuario"], $dados["email"], $dados["senhaUsuario"]);
    }

    if($user != null && $user-> validaUsuarioSenha($usuario, $senhaUsuario)){
        $_SESSION['user']=$user;
        header("Location: MenuPrincipal.php");
    }else{
        $_SESSION['msg']= "Usuário ou senha incorretos!!";
        header("Location: loginUsuario.php");
        exit;
    }

}else if(!isset($_SESSION['user'])){
    $_SESSION['msg']= "É necessário logar para acessar!";
    header("Location: loginUsuario.php");
    exit;
}

?>