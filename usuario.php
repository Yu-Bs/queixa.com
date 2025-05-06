<?php
class usuario{
    public $idUsuario, $nomeUsuario, $email, $senhaUsuario;

    function __construct($idUsuario, $nomeUsuario, $email, $senhaUsuario){
        $this-> idUsuario= $idUsuario;
        $this-> nomeUsuario= $nomeUsuario;
        $this-> email= $email;
        $this-> senhaUsuario= $senhaUsuario;
    }

    function validaUsuarioSenha($email, $senhaUsuario){
        if ($email==$this-> email && $senhaUsuario== $this-> senhaUsuario){
            return true;
        }
        return false;
    }


}

?>