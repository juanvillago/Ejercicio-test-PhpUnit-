<?php

declare(strict_types=1);
require_once './src/Calculadora.php';

use Juan\Calculadora\Calculadora;

use PHPUnit\Framework\TestCase;

class CalculadoraTest extends TestCase
{
    public function testSuma()
    {
        $calc = new Calculadora(10, 5);
        $this->assertEquals(15, $calc->sumar(), 'La suma debería ser 15');
    }

    public function testDivision()
    {
        $calc = new Calculadora(10, 10); 
        $this->assertEquals(1, $calc->dividir());
        $calc->dividir();
    }

    public function testResta()
    {
        $calc = new Calculadora(10, 5);
        $this->assertEquals(5, $calc->restar(), 'La resta debería ser 5');
    }

    public function testMultiplicacion()
    {
        $calc = new Calculadora(5, 5);
        $this->assertEquals(25, $calc->multiplicar(), 'La multiplicación debería ser 25');
    }

    public function testDivisionPorCero()
    {
        $calc = new Calculadora(10, 0);
        $this->expectException(DivisionByZeroError::class);
        $calc->dividir();
    }
}



