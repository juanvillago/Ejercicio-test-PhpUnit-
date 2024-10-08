<?php

declare(strict_types=1);


namespace Juan\Vehicle;

require_once __DIR__ . '/Vehicle.php';


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
        if ($numberOfDoors < 2 || $numberOfDoors > 4) {
            throw new InvalidArgumentException('the number of doors must be between 2 and 4');
        }
        return $numberOfDoors;
    }

    public function accelerate(int $amount): void
    {
        $this->speed += $amount;
    }
}
