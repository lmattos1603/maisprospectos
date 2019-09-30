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
    public function testDeletarProspect(){
        $prospect = new Prospect();
        
        $this->assertEquals(
            TRUE,
            $prospect->deletarProspect('8')
        );
        unset($prospect);
    }
}
?>