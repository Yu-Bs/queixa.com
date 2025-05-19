<?php
class produto{
    public $idProduto, $nomeProduto, $idEmpresa;

    function __construct($idProduto, $nomeProduto, $idEmpresa){
        $this-> idProduto= $idProduto;
        $this-> nomeProduto= $nomeProduto;
        $this-> idEmpresa= $idEmpresa;
    }

}

?>