<?php 

declare(strict_types=1);

namespace Juan\Calculadora;

class Calculadora
{
    private $a;
    private $b;

    public function __construct(int|float $a, int|float $b)
    {
        $this->a = $a;
        $this->b = $b; 
    }

    public function sumar()
    {
        return $this->a + $this->b;
    }

    public function dividir()
    {
        return $this->a / $this->b;
    }

    public function restar()
    {
        return $this->a - $this->b;
    }

    public function multiplicar()
    {
        return $this->a * $this->b;
    }
}
