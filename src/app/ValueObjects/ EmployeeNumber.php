<?php

namespace App\ValueObjects;

class EmployeeNumber
{
    private $value;

    private string $number;

    public function __construct(string $year, string $departmentId, string $uniqueNumber)
    {
        $this->number = 'CO' . $year . str_pad($departmentId, 2, '0', STR_PAD_LEFT) . str_pad($uniqueNumber, 4, '0', STR_PAD_LEFT);
    }

    public function __toString(): string
    {
        return $this->number;
    }

    
}    