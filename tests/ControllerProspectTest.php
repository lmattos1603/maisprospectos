<?php
namespace test;
$separador = DIRECTORY_SEPARATOR;
$root = $_SERVER['DOCUMENT_ROOT'].$separador;
require_once($root.'maisprospectos/uteis/vendor/autoload.php');
require_once($root.'maisprospectos/models/Prospect.php');
require_once($root.'maisprospectos/controllers/Prospect/prospectController.php');
use DAO\DAOProspect;
use PHPUnit\Framework\TestCase;
use models\Prospect;
use controllers\ControllerProspect;

/*require_once('../uteis/vendor/autoload.php');
require_once('../models/Prospect.php');
require_once('../controllers/Prospect/prospectController.php');
use PHPUnit\Framework\TestCase;
use models\Prospect;
use controllers\ControllerProspect;*/

class ControllerProspectTest extends TestCase{
   /** @test */
   /*public function testInserirProspect(){
      $ctrlProspect = new ControllerProspect();
      $prospect = new Prospect();
      $prospect->addProspecto(null, 'nome', 'cpf', 'email', 'telefone', 'whatsapp', 'rua', 'numero', 'facebook', 
                              'bairro', 'cidade', 'estado', 'cep');
      try{
      $this->assertEquals(
         TRUE,
         $ctrlProspect->salvarProspect($prospect)
      );
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }
    /** @test */
    public function alterarProspect(){
      $ctrlProspect = new ControllerProspect();
      $prospect = new Prospect();
      $prospect->addProspecto(21, 'Lucas', 'cpf', 'email', 'telefone', 'whatsapp', 'rua', 'numero', 'facebook', 
                             'bairro', 'cidade', 'estado', 'cep');
      try{
         $this->assertEquals(
            TRUE,
            $ctrlProspect->editProspect($prospect)
         );
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }
   /** @test */
   /*public function excluirProspect(){
      $ctrlProspect = new ControllerProspect();
      $prospect = new Prospect();
      $prospect->addProspecto(13, 'Lucas', 'cpf', 'email', 'telefone', 'whatsapp', 'rua', 'numero', 'facebook', 
                              'bairro', 'cidade', 'estado', 'cep');
      try{
         $this->assertEquals(
            TRUE,
            $ctrlProspect->excluirProspect($prospect)
         );
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }
   /** @test */
   /*public function buscarProspectPorEmail(){
      $ctrlProspect = new ControllerProspect();
      $prospect = new Prospect();
      $email = 'email';
      $arrayComparar = array();
      $conn = new \mysqli('localhost', 'root', '', 'prospects');
      $sqlBusca = $conn->prepare("select id, nome, cpf, email, telefone, whatsapp, rua, numero, facebook, bairro, cidade, estado, cep 
                                          from prospect
                                          where
                                          email = '$email'");
      $sqlBusca->execute();
      $result = $sqlBusca->get_result();
      if($result->num_rows !== 0){
         while($linha = $result->fetch_assoc()) {
            $linhaComparar = new Prospect();
            $linhaComparar->addProspecto($linha['id'], $linha['nome'], $linha['cpf'], $linha['email'], 
                              $linha['telefone'], $linha['whatsapp'], $linha['rua'], $linha['numero'], 
                              $linha['facebook'], $linha['bairro'], $linha['cidade'], $linha['estado'], $linha['cep']);
            $arrayComparar[] = $linhaComparar;
         }
      }
      $this->assertEquals(
         $arrayComparar,
          $ctrlProspect->buscarProspects($email)
      );
   }
    /** @test */
    /*public function buscarTodosProspects(){
      $ctrlProspect = new ControllerProspect();
         $prospect = new Prospect();
         $arrayComparar = array();
         $conn = new \mysqli('localhost', 'root', '', 'prospects');
         $sqlBusca = $conn->prepare("select id, nome, cpf, email, telefone, whatsapp, rua, numero, facebook, bairro, cidade, estado, cep 
                                    from prospect");
         $sqlBusca->execute();
         $result = $sqlBusca->get_result();
         if($result->num_rows !== 0){
            while($linha = $result->fetch_assoc()) {
               $linhaComparar = new Prospect();
               $linhaComparar->addProspecto($linha['id'], $linha['nome'], $linha['cpf'], $linha['email'], 
                                            $linha['telefone'], $linha['whatsapp'], $linha['rua'], $linha['numero'], 
                                            $linha['facebook'], $linha['bairro'], $linha['cidade'], $linha['estado'], 
                                            $linha['cep']);
               $arrayComparar[] = $linhaComparar;
            }
         }
         $this->assertEquals(
         $arrayComparar,
         $ctrlProspect->buscarProspects()
      );
   }*/
}
?>