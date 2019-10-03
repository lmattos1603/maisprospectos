<?php
namespace tests;

require_once('../vendor/autoload.php'); // recebe requerimentos da biblioteca PHPUnit.
require_once('../models/Prospect.php');

use models\Prospect;
use PHPUnit\Framework\TestCase;

class ProspectTest extends TestCase{
    /** @test */
    public function testBuscarProspect(){
        $prospect = new Prospect();
        
        $this->assertEquals(
            array(),
            $prospect->BuscarProspect('email')
        );
        unset($prospect);
    }
}
?>