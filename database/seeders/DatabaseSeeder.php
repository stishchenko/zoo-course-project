<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Animal;
use App\Models\Employee;
use App\Models\Feed;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $animals = Animal::factory()->count(10)->create();
        $employees = Employee::factory()->count(7)->create();
        $feeds = Feed::factory()->count(6)->create();

        foreach ($animals as $animal) {
            $employeeIds = $employees->random(rand(1, 3))->pluck('id');
            $animal->employees()->attach($employeeIds);

            $feedIds = $feeds->random(rand(1, 3))->pluck('id');
            $animal->feeds()->attach($feedIds, ['portion' => rand(100, 500)]);
        }

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
