<?php 
include_once './conexaoDatabase.php';
include_once './empresa.php';

session_start();

if (isset($_POST['empresa'])){
    $empresa = $_POST ['empresa'];
    $senhaEmpresa= $_POST['senhaEmpresa'];


    $consulta= mysqli_query($conexao, "select idEmpresa, nomeEmpresa, senhaEmpresa, cnpj, endereco, idSetor from empresa where cnpj='".$empresa."'");
    $dados= mysqli_fetch_assoc($consulta);
    $user= null;
    if($dados!= null){
        $user= new Empresa($dados["idEmpresa"], $dados["nomeEmpresa"], $dados["senhaEmpresa"],$dados["cnpj"], $dados["endereco"], $dados["idSetor"]);
    }

    if($user != null && $user-> validaEmpresaSenha($empresa, $senhaEmpresa)){
        $_SESSION['user']=$user;
        header("Location: MenuPrincipal.php");
    }else{
        $_SESSION['msg']= "CNPJ ou senha incorretos!!";
        header("Location: loginEmpresa.php");
        exit;
    }

}else if(!isset($_SESSION['user'])){
    $_SESSION['msg']= "É necessário logar para acessar!";
    header("Location: loginEmpresa.php");
    exit;
}
?>