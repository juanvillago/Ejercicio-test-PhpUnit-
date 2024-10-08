<?php

declare(strict_types=1);

require_once './src/Motorcycle.php';

use Juan\Vehicle\Motorcycle;

use PHPUnit\Framework\TestCase;

class MotorcycleTest extends TestCase
{


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


}