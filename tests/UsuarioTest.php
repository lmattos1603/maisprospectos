<?php
namespace tests;

require_once('../vendor/autoload.php'); // recebe requerimentos da biblioteca PHPUnit.
require_once('../models/Usuario.php');
require_once('../DAO/DAOUsuario.php');

use MODELS\Usuario;
use PHPUnit\Framework\TestCase;
use DAO\DAOUsuario;

class UsuarioTest extends TestCase{
    /** @test */
    public function testIncluirUsuario(){
        $daoUsuario = new DAOUsuario();
        
        $this->assertEquals(
            TRUE,
            $daoUsuario->incluirUsuario('Lucas', 'lmattos', '123', 'lmattos@mail.com', '123456')
        );
        unset($usuario);
    }
    /** @test */
    public function testLogar(){  // função para testar o login.
        $usuario = new Usuario(); // cria um novo usuario.
        $daoUsuario = new DAOUsuario();

        $usuario->addUsuario('Lucas', 'lmattos', '123', 'lmattos@mail.com', '123456', TRUE);
        $this->assertEquals(  // função que recebe dois parâmetros. 
            $usuario,  // 1º O que eu espero que retorne.
            $daoUsuario->logar('lmattos', '123') // 2º Parâmetro logar.
        );

        unset($usuario);  // função para não ficar alocado na memória.
    } 
}
?>