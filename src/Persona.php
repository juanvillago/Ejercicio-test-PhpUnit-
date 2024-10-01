<?php

declare (strict_types=1);

namespace prueba;

class Persona  
{
    private $name;
    private $years;

    public function __construct(string $name,int $years) 
 
    {
           if ($years<=0){
            throw new \InvalidArgumentException(message:"La edad debe ser un numero entero positivo");
           }
           $this->name=$name;
           $this->years=$years;
    }
    public function presentarse() : string
    {
        return "Hola, mi nombre es $this->name y tengo $this->years años";
    }

    public function getName():string{
        return $this->name;
    }
    public function setName(string $name):void 
    {
        $this->name=$name;
    }

    public function getYears(): int
    {
        return $this->years;
    }

    public function setYears(int $years): void
    {
        if ($years<= 0) {
            throw new \InvalidArgumentException(message:"La edad debe ser un numero entero positivo");

        }

        $this->years=$years;
    }
}

//$persona = new Persona('Juan', 20);
//echo $persona->presentarse();

