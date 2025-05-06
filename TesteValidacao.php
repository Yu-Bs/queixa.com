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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" 
    crossorigin="anonymous"></script>
    <title>Queixa.com</title>
</head>

<body>
<!--cor de fundo-->
<div class="p-3 mb-2 bg-info-subtle text-info-emphasis" style="height: 100vh;"> 
<?php echo $_SESSION['user']-> nomeUsuario ?>
</div>
</body>