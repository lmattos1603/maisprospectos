<?php
namespace CONTROLLERS;
require_once('../DAO/DAOProspect.php');
use DAO\DAOProspect;
/**
 * Esta classe é responsável por fazer o tratamento dos dados para apresentação e/ou
 * envio para a DAO
 * Seu escopo limita-se às funções da entidade Prospect
 *
 * @author Lucas de Mattos
 */
class ControllerProspect{
   /**
    * Recebe e trata os dados do prospect e envia para a DAO
    * gravar no banco de dados
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
    * @return TRUE|Exception Retorna TRUE caso a inclusão tenha sido bem sucedida
    * ou uma Exception caso não tenha.
    */
   public function salvarProspect($nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $facebook, $bairro, $cidade, $estado, $cep){
        $daoProspect = new DAOProspect();
      try{
         $prospect = $daoProspect->inserirProspect($nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $facebook, $bairro, $cidade, $estado, $cep);
         unset($daoProspect);
         return $prospect;
      }catch(\Exception $e){
         throw new \Exception($e->getMessage());
      }
   }
   
   /**
     * Faz o controle da alteração dos dados de um prospecto no sistema
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
     * @return TRUE|Exception TRUE inclusao bem sucedida ou Exception se não for bem sucedida
     */
    public function alterarProspect($nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $facebook, $bairro, $cidade, $estado, $cep, $id){
        $daoProspect = new DAOProspect();
 
      try{
         $prospect = $daoProspect->editarProspect($nome, $cpf, $email, $telefone, $whatsapp, $rua, $numero, $facebook, $bairro, $cidade, $estado, $cep, $id);
         unset($daoProspect);
         return TRUE;
      }catch(\Exception $e){
         throw new \Exception($e->getMessage());
      }
    }

    /**
     * Faz o controle da busca de um Prospecto pelo seu email cadastrado no sistema
     * @param string $email E-mail do Prospecto
     * @return Prospect retorna um array de objetos com os dados do Prospecto
     */
    public function procurarProspect(){
       $daoProspect = new DAOProspect();

       try{
         $prospect = $daoProspect->buscarProspect($email=null);
         unset($daoProspect);
         return $prospect;
      }catch(\Exception $e){
         throw new \Exception($e->getMessage());
      }
    }

    public function excluirProspect($id){
       $daoProspect = new DAOProspect();

       try{
         $prospect = $daoProspect->deletarProspect($id);
         unset($daoProspect);
         return TRUE;
      }catch(\Exception $e){
         throw new \Exception($e->getMessage());
      }
    }
}
?>