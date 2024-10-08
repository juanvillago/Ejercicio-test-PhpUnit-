<?php

declare(strict_types=1);

require_once './src/Truck.php';

use Juan\Vehicle\Truck;

use PHPUnit\Framework\TestCase;

class TruckTest extends TestCase
{

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