<?php
namespace tests;

require_once('../vendor/autoload.php');
require_once('../models/Usuario.php');

use models\Usuario;
use PHPUnit\Framework\TestCase;

class UsuarioTest extends TestCase{
    /** @test */
    public function testLogar(){
        $usuario = new Usuario();
        
        $this->assertEquals(
            TRUE,
            $usuario->logar('usuario', 'senha')
        );
    }

    public function testIncluirUsuario(){
        $usuario = new Usuario();
        
        $this->assertEquals(
            TRUE,
            $usuario->incluirUsuario('Lucas', 'lmattos@mail.com', 'lmattos', '123456')
        );
        unset($usuario);
    }
}
?>