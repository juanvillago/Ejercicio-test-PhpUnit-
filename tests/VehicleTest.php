<?php

declare(strict_types=1);
require_once './src/Vehicle.php';

use prueba\Vehicle;
use prueba\Car;
use prueba\Motorcycle;
use prueba\Truck;
// test case es la base para crear pruebas unitarias en phpunit
use PHPUnit\Framework\TestCase;

class VehicleTest extends TestCase
{

    public function testInitialSpeedIsZero()
    {
        $vehicle = new Vehicle(brand: 'Toyota', model: 'Corolla', speed: 0, transmissionType: 'automatic');
        $this->assertEquals(0, $vehicle->getSpeed());
    }

    public function testAccelerateIncreasesSpeed()
    {
        $vehicle = new Vehicle('Toyota', 'Corolla', 0, 'automatic');
        $vehicle->accelerate(50);
        $this->assertEquals(50, $vehicle->getSpeed());
    }

    public function testAccelerateRespectsLimits()
    {

        $vehicle = new Vehicle('Toyota', 'Corolla', 0, 'automatic');
        $vehicle->accelerate(200); 
        $this->assertLessThanOrEqual($vehicle->getMaxSpeed(), $vehicle->getSpeed());
    }

    public function testTransmissionTypeIsAssignedAndReturnedCorrectly()
    {
        $vehicle = new Vehicle('Toyota', 'Corolla', 0, 'automatic');
        $this->assertEquals('automatic', $vehicle->getTransmissionType());

        $vehicle = new Vehicle('Toyota', 'Corolla', 0, 'manual');
        $this->assertEquals('manual', $vehicle->getTransmissionType());
    }

    // test Car

    public function testCarAccelerate()
    {
        $car = new Car('Toyota', 'Corolla', 0, 'automatic', 4);
        $car->accelerate(50);
        $this->assertEquals(50, $car->getSpeed());
    }

    public function testCarBrake()
    {
        $car = new Car('Toyota', 'Corolla', 50, 'automatic', 4);
        $car->brake(20);
        $this->assertEquals(30, $car->getSpeed());
    }

    public function testCarRespectsSpeedLimits()
    {
        $car = new Car('Toyota', 'Corolla', 230, 'automatic', 4);
        $this->assertTrue($car->getSpeed() >= 0 && $car->getSpeed() <= $car->getMaxSpeed());
    }

    public function testCarDoorsAreAssignedCorrectly()
    {
        $car = new Car('Toyota', 'Corolla', 0, 'automatic', 4);
        $this->assertEquals(4, $car->getNumberOfDoors());
    }

    // test Motorcycle

    public function testMotorcycleAccelerate()
    {
        $motorcycle = new Motorcycle('Honda', 'CBR500R', 0, 'manual', 500);
        $motorcycle->accelerate(50);
        $this->assertEquals(50, $motorcycle->getSpeed());
    }

    public function testMotorcycleBrake()
    {
        $motorcycle = new Motorcycle('Honda', 'CBR500R', 50, 'manual', 500);
        $motorcycle->brake(20);
        $this->assertEquals(30, $motorcycle->getSpeed());
    }

    public function testMotorcycleRespectsSpeedLimits()
    {
        $motorcycle = new Motorcycle('Honda', 'CBR500R', 100, 'manual', 500);
        $this->assertTrue($motorcycle->getSpeed() >= 0 && $motorcycle->getSpeed() <= $motorcycle->getMaxSpeed());
    }
    public function testMotorcycleCylinderCapacityIsAssignedCorrectly()
    {
        $motorcycle = new Motorcycle('Honda', 'CBR500R', 0, 'manual', 500);
        $this->assertEquals(500, $motorcycle->getcylinderCapacity());
    }

    //test Truck

    public function testTruckAccelerate()
    {
        $truck = new Truck('Ford', 'F-150', 0, 'automatic', 2000);
        $truck->accelerate(50);
        $this->assertEquals(50, $truck->getSpeed());
    }

    public function testTruckBrake()
    {
        $truck = new Truck('Ford', 'F-150', 50, 'automatic', 2000);
        $truck->brake(60);
        $this->assertEquals(0, $truck->getSpeed());
    }

    public function testTruckRespectsSpeedLimits()
    {
        $truck = new Truck('Ford', 'F-150', 110, 'automatic', 2000);
        $this->assertTrue($truck->getSpeed() >= 0 && $truck->getSpeed() <= $truck->getMaxSpeed());
    }

    public function testTruckLoadCapacityIsAssignedCorrectly()
    {
        $truck = new Truck('Ford', 'F-150', 0, 'automatic', 2000);
        $this->assertEquals(2000, $truck->getloadCapacity());
    }
}
