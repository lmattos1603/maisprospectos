<?php
namespace MODELS;

class Prospect{
        public $id;
        public $nome;
        public $cpf;
        public $email;
        public $telefone;
        public $whatsapp;
        public $rua;
        public $numero;
        public $facebook;
        public $bairro;
        public $cidade;
        public $estado;
        public $cep;

        /**
         * Carrega os atributos da classe 
         * @param string $nome Nome do usuário
         * @param string $login Login do usuário
         * @param string $email Email do usuário
         * @param string $celular Celular do usuário
         * @param boolean $logado Status do usuário no sistema
         * @return void
         */
        public function addUsuario($id, $nome, $login, $email, $telefone, $whatsapp){
            $this->id = $id;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->email = $email;
            $this->telefone = $telefone;
            $this->whatsapp = $whatsapp;
            $this->rua = $rua;
            $this->numero = $numero;
            $this->facebook = $facebook;
            $this->bairro = $bairro;
            $this->cidade = $cidade;
            $this->estado = $estado;
            $this->cep = $cep;
        }
    }
?>