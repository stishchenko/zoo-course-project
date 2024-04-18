<?php

namespace App\DTOs;

class EmployeeDto
{
    public string $full_name;
    public string $birthday;
    public string $department;
    public string $job;
    public array|string $animals = [];

    public function __construct(string $full_name, string $birthday, string $department, string $job)
    {
        $this->full_name = $full_name;
        $this->birthday = $birthday;
        $this->department = $department;
        $this->job = $job;
    }
}
