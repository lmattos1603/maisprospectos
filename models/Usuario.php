<?php
namespace MODELS;
/**
 * Classe Model de usuário
 * @author Lucas de Mattos
 * @package MODELS 
 */
class Usuario{
    /**
     * Nome do Usuário
     * @var string
     */
    public $nome;
    /**
     * Login do Usuário
     * @var string
     */
    public $login;
    /**
     * Email do Usuário
     * @var string
     */
    public $email;
    /**
     * Celular do Usuário
     * @var string
     */
    public $celular;
    /**
     * Status do Usuário no sistema
     * @var boolean
     */
    public $logado;
    /**
     * Carrega os atributos da classe 
     * @param string $nome Nome do usuário
     * @param string $login Login do usuário
     * @param string $email Email do usuário
     * @param string $celular Celular do usuário
     * @param boolean $logado Status do usuário no sistema
     * @return void
     */
    public function addUsuario($nome, $login, $email, $celular, $logado){
        $this->nome = $nome;
        $this->login = $login;
        $this->email = $email;
        $this->celular = $celular;
        $this->logado = $logado;
    }
}
?>