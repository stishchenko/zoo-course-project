<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Animal extends Model
{
    use HasFactory;

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class);
    }

    public function feeds(): BelongsToMany
    {
        return $this->belongsToMany(Feed::class);
    }
}
