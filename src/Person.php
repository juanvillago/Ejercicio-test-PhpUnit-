<?php

declare(strict_types=1);

namespace prueba;

class Person
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)

    {
        $this->validatePositiveAge($age);
        $this->name = $name;
        $this->age = $age;
    }


    public function greetings(): string
    {
        return "Hello, my name is $this->name and i am $this->age years old";
    }

    public function name(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function age(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->validatePositiveAge($age);
        $this->age = $age;
    }

    public function isOlderThan(Person $otherPerson): bool
    {
        return $this->age() > $otherPerson->age();
    }

    public function isSameAge(Person $otherPerson): bool
    {
        return $this->age() === $otherPerson->age();
    }

    private function validatePositiveAge(int $age): void
    {
        if ($age <= 0) {
            throw new \InvalidArgumentException(message: "The age it should be a positive number");
        }
    }
}

//$persona = new Person('Juan', 20);
//echo $persona->presentarse();
