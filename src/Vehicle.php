<?php

declare(strict_types=1);

namespace Juan\Vehicle;

use Juan\Vehicle\Car;
use Juan\Vehicle\Motorcycle;
use Juan\Vehicle\Truck;



class Vehicle
{
    private $brand;
    private $model;
    protected $speed = 0;
    private $transmissionType;
    const MAX_SPEED = 240;
    const MAX_SPEED_CAR = 240;
    const MAX_SPEED_MOTORCYCLE = 180;
    const MAX_SPEED_TRUCK = 120;

    public function __construct(string $brand, string $model, int $speed, string $transmissionType)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->speed = $speed;
        $this->transmissionType = $transmissionType;
    }


    public function accelerate(int $amount): void
    {
        $newSpeed = $this->speed + $amount;

        if ($newSpeed > $this->getMaxSpeed()) {
            throw new \Exception('the velocity exceed the limit');
        } else {
            $this->speed = $newSpeed;
        }

        if ($this->speed < 0) {
            $this->speed = 0;
        }
    }
    public function brake(int $amount): void
    {
        $this->speed -= $amount;

        if ($this->speed < 0) {
            $this->speed = 0;
        }
    }

    public function getMaxSpeed(): int
    {
        if ($this instanceof Car) {
            return self::MAX_SPEED_CAR;
        }
        if ($this instanceof Motorcycle) {
            return self::MAX_SPEED_MOTORCYCLE;
        }

        if ($this instanceof Truck) {
            return self::MAX_SPEED_TRUCK;
        }

        return self::MAX_SPEED;
    }

    public function getSpeed(): float|int
    {
        return $this->speed ?? 0;
    }

    public function getTransmissionType(): string
    {
        return $this->transmissionType;
    }
}



/*
$vehicle = new Vehicle('Ford', 'F-150', 280, 'automatic');
echo "Velocidad actual: " . $vehicle->getSpeed() . "\n";
echo "Velocidad máxima: " . $vehicle->getMaxSpeed() . "\n";

echo "<br>". "<br>";

$truck = new Truck('Ford', 'F-150', 20, 'automatic', 2000);
echo "Velocidad actual: " . $truck->getSpeed() . "\n";
$truck->brake(60); // Aplicar frenos para que la velocidad sea negativa
echo "Velocidad después de frenar: " . $truck->getSpeed() . "\n";
*/