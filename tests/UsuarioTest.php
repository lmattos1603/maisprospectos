<?php
namespace tests;

require_once('../vendor/autoload.php'); // recebe requerimentos da biblioteca PHPUnit.
require_once('../models/Usuario.php');

use models\Usuario;
use PHPUnit\Framework\TestCase;

class UsuarioTest extends TestCase{
    /** @test */
    public function testLogar(){  // função para testar o login.
        $usuario = new Usuario(); // cria um novo usuario.
        
        $this->assertEquals(  // função que recebe dois parâmetros. 
            TRUE,  // 1º O que eu espero que retorne.
            $usuario->logar('lucas', '123') // 2º Parâmetro logar.
        );

        unset($usuario);  // função para não ficar alocado na memória.
    }
    /** @test */
    public function testIncluirUsuario(){
        $usuario = new Usuario();
        
        $this->assertEquals(
            TRUE,
            $usuario->incluirUsuario('Lucas', 'lmattos', '', 'lmattos@mail.com', '123456')
        );
        unset($usuario);
    }
}
?>