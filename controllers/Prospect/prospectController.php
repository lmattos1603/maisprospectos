<?php
namespace CONTROLLERS;
$separador = DIRECTORY_SEPARATOR;
$root = $_SERVER['DOCUMENT_ROOT'].$separador;
require_once($root.'maisprospectos/DAO/DAOProspect.php');
use DAO\DAOProspect;
/**
 * Esta classe é responsável por fazer o tratamento dos dados para apresentação e/ou
 * envio para a DAO executar as consultas no banco de dados.
 * Seu escopo se limita às funções da entidade prospect.
 *
 * @author Lucas Mattos
 *
 */
class ControllerProspect{
   /**
    * Recebe um objeto do tipo Prospect, verifica se é para salvar ou alterar
    * e envia para a DAO executar a operação solicitada
    *
    * @param Prospect $prospect Objeto do tipo usuário
    * @return TRUE|Exception Retorna TRUE caso a operação tenha sido bem sucedida e Exception, caso não tenha.
    */
   public function salvarProspect($prospect){
      $daoProspect = new DAOProspect();
      if($prospect->id === null){
         /**
          * Captura a exceção retornada pelo DAO no caso de falha ao incluir prospect
          * e dispara outra exceção para ser tratada por quem chamar a função
          */
         try{
            $daoProspect->inserirProspect($prospect->nome, $prospect->cpf, $prospect->email, $prospect->telefone,
            $prospect->whatsapp, $prospect->rua, $prospect->numero, $prospect->facebook, $prospect->bairro,
            $prospect->cidade, $prospect->estado, $prospect->cep);
            return TRUE;
         }catch(\Exception $e){
            throw new \Exception($e->getMessage());
         }
      }else{
          /**
          * Captura a exceção retornada pelo DAO no caso de falha ao atualizar prospect
          * e dispara outra exceção para ser tratada por quem chamar a função
          */
         try{
            $daoProspect->editarProspect($prospect->nome, $prospect->cpf, $prospect->email, $prospect->telefone,
            $prospect->whatsapp, $prospect->rua, $prospect->numero, $prospect->facebook, $prospect->bairro,
            $prospect->cidade, $prospect->estado, $prospect->cep, $prospect->id);
            unset($daoProspect);
            return TRUE;
         }catch(\Exception $e){
            throw new \Exception($e);
         }
      }
   }
   /**
    * Recebe um objeto do tipo Prospect e envia para a DAO concluir a exclusão
    *
    * @param Prospect $prospect Objeto Prospect informando o código do prospect a ser excluído
    * @return TRUE|Exception Retorna TRUE caso a inclusão tenha sido bem sucedida
    * ou uma Exception caso não tenha.
    */
   public function excluirProspect($prospect){
      $daoProspect = new DAOProspect();
      /**
       * Captura a exceção retornada pelo DAO no caso de falha ao excluir prospect
       * e dispara outra exceção para ser tratada por quem chamar a função
       */
      try{
         $daoProspect->deletarProspect($prospect->id);
         unset($daoProspect);
         return TRUE;
      }catch(\Exception $e){
         throw new \Exception($e->getMessage());
      }
   }
   public function buscarProspects($email=null){
     $daoProspect = new DAOProspect();
     $prospects = array();
     if($email === null){
        $prospects = $daoProspect->buscarProspect();
        return $prospects;
     }else{
        $prospects = $daoProspect->buscarProspect($email);
        return $prospects;
     }
   }
}
?>