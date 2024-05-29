<?php

namespace App\DTOs;

class AnimalDto
{
    public string $name;
    public string $species;
    public string $birthday;
    public string $gender;
    public array|string $employees = [];
    public array|string $feeds = [];

    public function __construct(string $name, string $species, string $birthday, string $gender)
    {
        $this->name = $name;
        $this->species = $species;
        $this->birthday = $birthday;
        $this->gender = $gender;
    }

}
