<?php
class empresa{
    public $idEmpresa, $nomeEmpresa, $senhaEmpresa, $cnpj, $endereco, $idSetor;

    function __construct($idEmpresa, $nomeEmpresa, $senhaEmpresa, $cnpj, $endereco, $idSetor){
        $this-> idEmpresa= $idEmpresa;
        $this-> nomeEmpresa= $nomeEmpresa;
        $this-> cnpj= $cnpj;
        $this-> senhaEmpresa= $senhaEmpresa;
        $this-> idSetor= $idSetor;
    }

    function validaEmpresaSenha($cnpj, $senhaEmpresa){
        if ($cnpj==$this-> cnpj && $senhaEmpresa== $this-> senhaEmpresa){
            return true;
        }
        return false;
    }


}

?>