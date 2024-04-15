<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Employee;
use App\Models\Feed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $animals = Animal::factory()->count(5)->create();
        $employees = Employee::factory()->count(3)->create();
        $feeds = Feed::factory()->count(3)->create();

        foreach ($animals as $animal) {
            $employeeIds = $employees->random(rand(1, 2))->pluck('id');
            $animal->employees()->attach($employeeIds);

            $feedIds = $feeds->random(rand(1, 3))->pluck('id');
            $animal->feeds()->attach($feedIds, ['portion' => rand(100, 500)]);
        }
    }
}
