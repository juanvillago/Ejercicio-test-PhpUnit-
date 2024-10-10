<?php 

declare(strict_types=1);

namespace Juan\Employee;
use InvalidArgumentException;


class Employee
{

    private $name;
    private $surnames;
    private $email;
    private $phone;
    private $ratetime;
    private $worktime;

    public function __construct(string $name, string $surnames, string $email, int $phone,  float $ratetime) 
    {
        $this->name=$name;
        $this->surnames=$surnames;
        $this->email=$email;
        $this->phone=$phone;
        $this->ratetime=$ratetime;
    }

    function registerhours($hours){

        if ($hours<0){
            
            throw new InvalidArgumentException("Las horas no pueden ser negativas");
        }

        $this->worktime+=$hours;
    }

        public function calculatePay(): float|int
        {
            return $this->worktime * $this->ratetime;
        }    

    
    public function getname(): string
        {
            return $this->name;    
        }

    public function getsurnames(): string{

        return $this->surnames;
    }

    public function getemail(): string{

        return $this->email;
    }

    public function getphone(): int{

        return $this->phone;
    }

    public function getratetime(): float|int{

        return $this->ratetime;
    }
    public function getworktime(): float|int{

        return $this->worktime;
    }
    


}





?>