<?php

declare(strict_types=1);

require_once './src/Employee.php';

use Juan\Employee\Employee;

use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{
    public function testCreateEmployee()
    {
        $employee = new Employee('Juan', 'Gonzalez', 'juan@gmail.com', 123456789, 10.0);

        $this->assertEquals('Juan', $employee->getname());
        $this->assertEquals('Gonzalez', $employee->getsurnames());
        $this->assertEquals('juan@gmail.com', $employee->getemail());
        $this->assertEquals(123456789, $employee->getphone());
        $this->assertEquals(10.0, $employee->getratetime());
    }

    public function test_RegisterHours()
    {
        $employee = new Employee('Juan', 'Gonzalez', 'juan@gmail.com', 123456789, 10.0);
        $employee->registerhours(10);

        $this->assertEquals(10, $employee->getworktime());
    }

    public function test_CalculatePay()
    {
        $employee = new Employee('Juan', 'Gonzalez', 'juan@gmail.com', 123456789, 10.0);
        $employee->registerhours(10);
        $this->assertEquals(100.0, $employee->calculatePay());
    }

    public function test_Registerhours_with_negative_hours()
    {
        $employee = new Employee('Juan', 'Gonzalez', 'juan@gmail.com', 123456789, 10.0);
        $this->expectException(InvalidArgumentException::class);
        $employee->registerhours(-10);
    }
}
