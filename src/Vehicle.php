<?php

declare(strict_types=1);

namespace prueba;

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
            $this->speed = $this->getMaxSpeed();
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
        // Validar que la velocidad no sea negativa
        if ($this->speed < 0) {
            $this->speed = 0;
        }
    }

    public function getMaxSpeed(): int
    {
        if ($this instanceof Car) 
        {
            return self::MAX_SPEED_CAR;
        } elseif ($this instanceof Motorcycle) {
            return self::MAX_SPEED_MOTORCYCLE;
        } elseif ($this instanceof Truck) {
            return self::MAX_SPEED_TRUCK;
        } elseif ($this instanceof Vehicle) {
            return self::MAX_SPEED;
        } else {
            throw new \Exception('no vehicle recognized');
        }
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

class Car extends Vehicle
{
    private $numberOfDoors;
    const MAX_SPEED = self::MAX_SPEED_CAR;

    public function __construct(string $brand, string $model, int $speed, string $transmissionType, int $numberOfDoors)
    {

        parent::__construct($brand, $model, $speed, $transmissionType);
        $this->numberOfDoors = $this->validateNumberOfDoors($numberOfDoors);
    }

    public function getNumberOfDoors()
    {
        return $this->numberOfDoors;
    }

    private function validateNumberOfDoors(int $numberOfDoors): int
    {
        if ($numberOfDoors < 2 || $numberOfDoors > 4) 
        {
            throw new InvalidArgumentException('the number of doors must be between 2 and 4');
        }
        return $numberOfDoors;
    }

    public function accelerate(int $amount): void
    {
        $this->speed += $amount;
    }
}

class Motorcycle extends Vehicle
{
    const MAX_SPEED = self::MAX_SPEED_MOTORCYCLE;
    private int $cylinderCapacity;

    public function __construct(string $brand, string $model, int $speed, string $transmissionType, int $cylinderCapacity)
    {
        parent::__construct($brand, $model, $speed, $transmissionType);
        $this->cylinderCapacity = $this->validateCylinderCapacity($cylinderCapacity);
    }

    private function validateCylinderCapacity(int $cylinderCapacity): int
    {
        if ($cylinderCapacity < 50 || $cylinderCapacity > 2000) 
        {
            throw new InvalidArgumentException('the cilinder capacity must be between 50 and 2000 cc');
        }
        return $cylinderCapacity;
    }

    public function getcylinderCapacity()
    {
        return $this->cylinderCapacity;
    }
}


class Truck extends Vehicle
{
    const MAX_SPEED = self::MAX_SPEED_TRUCK;
    private float $loadCapacity;

    public function __construct(string $brand, string $model, int $speed, string $transmissionType, float $loadCapacity)
    {
        parent::__construct($brand, $model, $speed, $transmissionType);
        $this->loadCapacity = $this->validateloadCapacity($loadCapacity);
    }

    private function validateloadCapacity(float $loadCapacity): float
    {
        if ($loadCapacity < 0 || $loadCapacity > 10000) {
            throw new InvalidArgumentException('the load capacity must be between 0 and 10000 kg');
        }
        return $loadCapacity;
    }

    public function getloadCapacity()
    {
        return $this->loadCapacity;
    }
}
class InvalidArgumentException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}

/*
$truck = new Truck('Ford', 'F-150', 220, 'automatic', 2000);
echo "Velocidad actual: " . $truck->getSpeed() . "\n";
echo "Velocidad máxima: " . $truck->getMaxSpeed() . "\n";

echo "<br>". "<br>";

$truck = new Truck('Ford', 'F-150', 20, 'automatic', 2000);
echo "Velocidad actual: " . $truck->getSpeed() . "\n";
$truck->brake(60); // Aplicar frenos para que la velocidad sea negativa
echo "Velocidad después de frenar: " . $truck->getSpeed() . "\n";
*/