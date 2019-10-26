<?php
namespace test;
require_once('../uteis/vendor/autoload.php');
require_once('../models/Prospect.php');
require_once('../controllers/Prospect/prospectController.php');
use PHPUnit\Framework\TestCase;
use models\Prospect;
use controllers\ControllerProspect;

class ControllerProspectTest extends TestCase{
   /** @test */
   /*public function testInserirProspect(){
      $ctrlProspect = new ControllerProspect();
      $prospect = new Prospect();
      $prospect->addProspecto("nome", "cpf", "email", "telefone", "whatsapp", "rua", "numero", "facebook", "bairro", "cidade", "estado", "cep", TRUE);
      try{
      $this->assertEquals(
         TRUE,
         $ctrlProspect->salvarProspect('nome', 'cpf', 'email', 'telefone', 'whatsapp', 'rua', 'numero', 'facebook', 'bairro', 'cidade', 'estado', 'cep')
      );
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }*/

   /** @test */
   /*public function testAlterarProspect(){
      $ctrlProspect = new ControllerProspect();
      try{
      $this->assertEquals(
         TRUE,
         $ctrlProspect->alterarProspect('lucas', 'cpf', 'email', 'telefone', 'whatsapp', 'rua', 'numero', 'facebook', 'bairro', 'cidade', 'estado', 'cep', '8')
      );
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }*/

   /** @test */
   /*public function testProcurarProspect($email){
      $ctrlProspect = new ControllerProspect();
      try{
      $this->assertEquals(
         $prospect,
         $ctrlProspect->procurarProspect('email')
      );
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }*/
   
   /** @test */
   public function testApagarProspect(){
      $ctrlProspect = new ControllerProspect();
      try{
      $this->assertEquals(
         TRUE,
         $ctrlProspect->excluirProspect('8')
      );
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }
}
?>