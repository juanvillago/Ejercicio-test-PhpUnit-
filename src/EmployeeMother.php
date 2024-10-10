<?php

declare(strict_types=1);

namespace Juan\Employee;
require_once __DIR__ . '/Employee.php';
use Faker\Factory ;

final class EmployeeMother
{
    public static function create(
        string $name = null,
        string $surnames = null,
        string $email = null,
        string $phone = null,
        float $ratetime = null
    ): Employee {
        $faker = Factory::create();

        return new Employee(
            $name ?? $faker->name,
            $surnames ?? $faker->lastName,
            $email ?? $faker->email,
            intval($phone ?? $faker->phoneNumber),
            $ratetime ?? $faker->randomFloat(2, 0, 100)
        );
    }
}

