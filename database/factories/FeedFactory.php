<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feed>
 */
class FeedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'type' => $this->faker->word,
            'manufacturer' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 100, 2000),
            'expiration_date' => $this->faker->date(),
            'unit' => $this->faker->word,
            'total_amount' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
