<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/Car.php';

use Juan\Vehicle\Car;

use PHPUnit\Framework\TestCase;

class CarTest extends TestCase{

    public function testCarAccelerate()
    {
        $car = new Car('Ford', 'Fiesta', 0, 'automatic', 4);
        $car->accelerate(50);
        $this->assertEquals(50, $car->getSpeed());
    }

    public function testCarBrake()
    {
        $car = new Car('Ford', 'Fiesta', 50, 'automatic', 4);
        $car->brake(20);
        $this->assertEquals(30, $car->getSpeed());
    }

    public function testCarRespectsSpeedLimits()
    {
        $car = new Car('Ford', 'Fiesta', 0, 'automatic', 4);
        $this->assertTrue($car->getSpeed() >= 0 && $car->getSpeed() <= $car->getMaxSpeed());
    }

    public function testCarDoorsAreAssignedCorrectly()
    {
        $car = new Car('Ford', 'Fiesta', 0, 'automatic', 4);
        $this->assertEquals(4, $car->getNumberOfDoors());
    }

}