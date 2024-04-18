<?php

namespace App\DTOs;

class FeedDto
{
    public string $title;
    public string $type;
    public float $price;
    public string $expiration_date;
    public string $amount;
    public array|string $animals = [];

    public function __construct(string $title, string $type, float $price, string $expiration_date, string $amount)
    {
        $this->title = $title;
        $this->type = $type;
        $this->price = $price;
        $this->expiration_date = $expiration_date;
        $this->amount = $amount;
    }
}
