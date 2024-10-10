<?php

declare(strict_types=1);

require_once './src/EmployeeMother.php';

use Juan\Employee\Employee;
use Juan\Employee\EmployeeMother;

use PHPUnit\Framework\TestCase;

class EmployeeMotherTest extends TestCase
{
    public function testCreateEmployee(): void
    {
        $employee = EmployeeMother::create();
 
        $this->assertInstanceOf(Employee::class, $employee);
        $this->assertNotNull($employee->getName());
        $this->assertNotNull($employee->getSurnames());
    }

    public function testCreateEmployeeWithCustomName(): void
    {
        $employee = EmployeeMother::create('John');
 
        $this->assertInstanceOf(Employee::class, $employee);
        $this->assertEquals('John', $employee->getName());
    }

    public function testCreateEmployeeWithCustomSurnames(): void
    {
        $employee = EmployeeMother::create(null, 'Doe');
 
        $this->assertInstanceOf(Employee::class, $employee);
        $this->assertEquals('Doe', $employee->getSurnames());
    }

    public function testCreateEmployeeWithCustomEmail(): void
    {
        $employee = EmployeeMother::create(null, null, 'john.doe@example.com');
 
        $this->assertInstanceOf(Employee::class, $employee);
        $this->assertEquals('john.doe@example.com', $employee->getEmail());
    }
}