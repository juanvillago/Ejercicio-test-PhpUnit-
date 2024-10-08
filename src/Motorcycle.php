<?php

declare(strict_types=1);

namespace Juan\Vehicle;

require_once __DIR__ . '/Vehicle.php';


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
        if ($cylinderCapacity < 50 || $cylinderCapacity > 2000) {
            throw new InvalidArgumentException('the cilinder capacity must be between 50 and 2000 cc');
        }
        return $cylinderCapacity;
    }

    public function getcylinderCapacity()
    {
        return $this->cylinderCapacity;
    }
}
