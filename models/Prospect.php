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
         * @param string $nome Nome do Prospecto
         * @param string $cpf CPF do Prospecto
         * @param string $email E-mail do Prospecto
         * @param string $telefone Telefone do Prospecto
         * @param string $whatsapp WhatsApp do Prospecto
         * @param string $rua Endereço do Prospecto
         * @param string $numero Número da casa ou apartamento
         * @param string $facebook Facebook do Prospecto
         * @param string $bairro Bairro que o Prospecto mora
         * @param string $cidade Cidade que o Prospecto mora
         * @param string $estado Estado que o Prospecto mora
         * @param string $cep CEP da cidade ou endereço do Prospecto
         * @param int $id Id do Prospecto a ser editado
         */
        public function addUsuario($id, $nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $facebook, $bairro, $cidade, $estado, $cep){
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