<?php

declare(strict_types=1);
require_once './src/Person.php';

use prueba\Person;
// test case es la base para crear pruebas unitarias en phpunit
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{


    public function test_it_should_validate_name_and_age_is_equal()
    {
        $person = new Person("Juan", 22);
        $this->assertEquals("Juan", $person->name());
        $this->assertEquals(22, $person->age());
    }

    public function test_it_should_validate_age_is_negative()
    {
        $this->expectException(InvalidArgumentException::class);
        new Person("Juan", -2);
    }

    public function test_it_should_validate_age_is_not_numerical()
    {
        $this->expectException(TypeError::class);
        new Person('Juan', 'veinte');
    }

    public function test_it_should_validate_greetings()
    {
        $person = new Person('Juan', 20);
        $this->assertEquals(
            'Hello, my name is Juan and i am 20 years old',
            $person->greetings()
        );
    }

    //nuevas pruebas

    public function test_it_should_update_name_and_age()
    {
        $person = new Person('Juan', 25);
        $person->setName('Pedro');
        $person->setAge(30);

        $this->assertEquals(30, $person->age());
        $this->assertEquals('Pedro', $person->name());
    }

    public function test_it_should_change_age_is_negative()
    {
        $this->expectException(InvalidArgumentException::class);
        $person = new Person('Juan', 25);
        $person->setAge(-1);
    }

    public function test_it_should_change_age_is_not_numerical()
    {
        $this->expectException(TypeError::class);
        $person = new Person('Juan', 25);
        $person->setAge('veinte');
    }

    public function test_it_should_compared_age()
    {
        $person1 = new Person('Juan', 25);
        $person2 = new Person('Pedro', 30);
        $person3 = new Person('Luis', 20);
       
        $this->assertFalse($person1->isOlderThan($person2));
        $this->assertTrue($person1->isOlderThan($person3));
    }

    public function test_it_should_compare_same_age()
    {
        $person1 = new Person('Juan', 20);
        $person2 = new Person('Pedro', 20);
       
        $this->assertTrue($person1->isSameAge($person2));
        $this->assertEquals(true, $person1->isSameAge($person2));
    }

    public function test_it_should_compare_diferent_age()
    {
        $person1 = new Person('Juan', 20);
        $person2 = new Person('Pedro', 15);
       
        $this->assertFalse($person1->isSameAge($person2));
    }
}
