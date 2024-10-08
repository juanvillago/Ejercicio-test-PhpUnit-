<?php

declare(strict_types=1);

namespace Juan\Vehicle;

require_once __DIR__ . '/Vehicle.php';



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
