<?php

namespace App\Models;

use App\DTOs\FeedDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Feed extends Model
{
    use HasFactory;

    public function animals(): BelongsToMany
    {
        return $this->belongsToMany(Animal::class)->withPivot('portion');
    }

    public function formatFeed()
    {
        $feedDto = new FeedDto($this->manufacturer . ' ' . $this->name,
            $this->type, $this->price, $this->expiration_date, $this->total_amount . ' ' . $this->unit);
        $feedDto->animals = $this->relationLoaded('animals')
            ? $this->getRelation('animals')->map(function ($animal) {
                return $animal->formatAnimal();
            })->toArray()
            : 'No animals';
        return $feedDto;
    }
}
