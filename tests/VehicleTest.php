<?php

declare(strict_types=1);
require_once './src/Vehicle.php';

use Juan\Vehicle\Vehicle;


// test case es la base para crear pruebas unitarias en phpunit
use PHPUnit\Framework\TestCase;

class VehicleTest extends TestCase
{

    public function testInitialSpeedIsZero()
    {
        $vehicle = new Vehicle(brand: 'Ford', model: 'Fiesta', speed: 0, transmissionType: 'automatic');
        $this->assertEquals(0, $vehicle->getSpeed());
    }

    public function testAccelerateIncreasesSpeed()
    {
        $vehicle = new Vehicle('Ford', 'Fiesta', 0, 'automatic');
        $vehicle->accelerate(50);
        $this->assertEquals(50, $vehicle->getSpeed());
    }

    public function testAccelerateRespectsLimits()
    {

        $vehicle = new Vehicle('Ford', 'Fiesta', 0, 'automatic');
        $vehicle->accelerate(230); 
        $this->assertTrue($vehicle->getSpeed() >= 0 && $vehicle->getSpeed() <= $vehicle->getMaxSpeed());
    }

    public function testTransmissionTypeIsAssignedAndReturnedCorrectly()
    {
        $vehicle = new Vehicle('Ford', 'Fiesta', 0, 'automatic');
        $this->assertEquals('automatic', $vehicle->getTransmissionType());

        $vehicle = new Vehicle('Ford', 'Fiesta', 0, 'manual');
        $this->assertEquals('manual', $vehicle->getTransmissionType());
    }

}
