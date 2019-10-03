<?php
namespace MODELS;

class Usuario{
    public $nome;
    public $login;
    public $email;
    public $celular;
    public $logado;

    public function addUsuario($nome, $login, $email, $celular, $logado){
        $this->nome = $nome;
        $this->login = $login;
        $this->email = $email;
        $this->celular = $celular;
        $this->logado = $logado;
    }
}
?>