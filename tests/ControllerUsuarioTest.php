<?php
namespace test;
require_once('../uteis/vendor/autoload.php');
require_once('../models/Usuario.php');
require_once('../controllers/Usuario/usuarioController.php');
use PHPUnit\Framework\TestCase;
use models\Usuario;
use controllers\ControllerUsuario;

class ControllerUsuarioTest extends TestCase{
   /** @test */
   public function testLogar(){
      $ctrlUsuario = new ControllerUsuario();
      $usuario = new Usuario();
      $usuario->addUsuario("Lucas", "lmattos", "lmattos@mail.com", "123456", TRUE);
      $this->assertEquals(
         $usuario,
         $ctrlUsuario->fazerLogin('lmattos', '123')
      );
   }
   /*public function testIncluirUsuario(){
      $ctrlUsuario = new ControllerUsuario();
      $usuario = new Usuario();
      try{
         $this->assertEquals(
            TRUE,
            $ctrlUsuario->salvarUsuario('Marcos Dias', 'dias@noites.com', 'dias', '145')
         );
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }*/
}
?>