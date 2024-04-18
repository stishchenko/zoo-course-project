<?php

namespace App\Models;

use App\DTOs\AnimalDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use HasFactory;

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class);
    }

    public function feeds(): BelongsToMany
    {
        return $this->belongsToMany(Feed::class)->withPivot('portion');
    }

    public function formatAnimal()
    {
        $animalDto = new AnimalDto($this->name, $this->species, $this->birthday, $this->gender);

        $animalDto->employees = $this->relationLoaded('employees')
            ? $this->getRelation('employees')->map(function ($employee) {
                return $employee->formatEmployee();
            })->toArray()
            : 'No employees';
        $animalDto->feeds = $this->relationLoaded('feeds')
            ? $this->getRelation('feeds')->map(function ($feed) {
                return $feed->formatFeed();
            })->toArray()
            : 'No feeds';

        return $animalDto;
    }

}
