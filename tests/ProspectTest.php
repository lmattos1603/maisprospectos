<?php
namespace tests;

require_once('../vendor/autoload.php'); // recebe requerimentos da biblioteca PHPUnit.
require_once('../models/Prospect.php');

use models\Prospect;
use PHPUnit\Framework\TestCase;

class ProspectTest extends TestCase{
    /** @test */
    public function testInserirProspect(){
        $prospect = new Prospect();
        
        $this->assertEquals(
            TRUE,
            $prospect->InserirProspect('nome', 'cpf', 'email', 'telefone', 'whatsapp', 'rua', 'numero', 'facebook', 'bairro', 'cidade', 'estado', 'cep')
        );
        unset($prospect);
    }
/** @test */
    public function testEditarProspect(){
        $prospect = new Prospect();
        
        $this->assertEquals(
            TRUE,
            $prospect->EditarProspect('Lucas', '09473051905', 'lucas@mail.com', '49998058418', '49998058418', 'Prolongamento Salgado Filho', '1276', 'Lucas Mattos', 'centro', 'Caçador', 'SC', '89509042', '1')
        );
        unset($prospect);
    }
/** @test */
    public function testBuscarProspect(){
        $prospect = new Prospect();
        
        $this->assertEquals(
            TRUE,
            $prospect->BuscarProspect('lucas@mail.com')
        );
        unset($prospect);
    }
/** @test */
    public function testDeletarProspect(){
        $prospect = new Prospect();
        
        $this->assertEquals(
            TRUE,
            $prospect->DeletarProspect('1')
        );
        unset($prospect);
    }
}
?>