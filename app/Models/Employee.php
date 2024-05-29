<?php

namespace App\Models;

use App\DTOs\EmployeeDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    use HasFactory;

    public function animals(): BelongsToMany
    {
        return $this->belongsToMany(Animal::class);
    }

    public function formatEmployee()
    {
        $employeeDto = new EmployeeDto($this->name . ' ' . $this->surname,
            $this->birthday, $this->department, $this->job);
        $employeeDto->animals = $this->relationLoaded('animals')
            ? $this->getRelation('animals')->map(function ($animal) {
                return $animal->formatAnimal();
            })->toArray()
            : 'No animals';
        return $employeeDto;
    }
}
