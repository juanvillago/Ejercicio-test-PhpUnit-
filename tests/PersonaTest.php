<?php 
declare (strict_types=1);
require_once './src/Persona.php';
use prueba\Persona;
// test case es la base para crear pruebas unitarias en phpunit
use PHPUnit\Framework\TestCase;

class PersonaTest extends TestCase {


    public function test_AsignacionNombre()
    {  
        $persona= new Persona("Juan",22);
        $this->assertEquals("Juan", $persona->getName());

 }
    public function test_AsignacionEdad()
    {
        $persona= new Persona("Juan",22);
        $this->assertEquals(22, $persona->getYears());
    }

    public function test_EdadNegativa()
    {
        $this->expectException(InvalidArgumentException::class);
        new Persona("Juan",-2);

    }

    public function test_EdadPositiva()
{
    $this->expectNotToPerformAssertions();
    new Persona('Juan', 22);
}

    public function test_EdadValidacionNumerica()
    {
        $this->expectException(TypeError::class);
        new Persona('Juan', 'veinte');
    }


    public function test_Presentarse()
    {
        $persona = new Persona('Juan', 20);
        $this->assertEquals('Hola, mi nombre es Juan y tengo 20 años',
         $persona->presentarse());
    }

    public function test_PresentarseEdadNegativa()
    {
        $this->expectException(InvalidArgumentException::class);
        $persona = new Persona('Juan', -1);
        $persona->presentarse();
    }

    public function test_PresentarseEdadNoNumerica()
    {
        $this->expectException(TypeError::class);
        $persona = new Persona('Juan', "veinte");
        $persona->presentarse();
    }


}

