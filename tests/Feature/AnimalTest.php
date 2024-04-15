<?php

namespace Tests\Feature;

use App\Models\Animal;
use App\Models\Employee;
use App\Models\Feed;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AnimalTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(TestSeeder::class);
    }

    public function test_animals_reading_without_relations(): void
    {
        $this->assertDatabaseCount('animals', 5);
        $animals = Animal::all();
        $this->assertCount(5, $animals, 'Incorrect amount of animals');
        foreach ($animals as $animal) {
            $animalArray = $animal->toArray();

            $this->assertIsArray($animalArray);
            $this->assertArrayHasKey('id', $animalArray);
            $this->assertIsInt($animalArray['id']);
            $this->assertArrayHasKey('name', $animalArray);
            $this->assertIsString($animalArray['name']);
            $this->assertArrayHasKey('species', $animalArray);
            $this->assertIsString($animalArray['species']);
            $this->assertArrayHasKey('gender', $animalArray);
            $this->assertIsString($animalArray['gender']);
        }
    }

    public function test_animals_reading_with_employees(): void
    {
        $this->assertDatabaseCount('animals', 5);
        $animals = Animal::with('employees')->get();
        $this->assertCount(5, $animals, 'Incorrect amount of animals');
        foreach ($animals as $animal) {
            $this->assertModelExists($animal);

            $employees = $animal->employees;
            $this->assertNotNull($employees);
            $this->assertTrue($employees->count() > 0);
        }
    }

    public function test_animals_reading_with_feeds(): void
    {
        $this->assertDatabaseCount('animals', 5);
        $animals = Animal::with('feeds')->get();
        $this->assertCount(5, $animals, 'Incorrect amount of animals');
        foreach ($animals as $animal) {
            $this->assertModelExists($animal);

            $feeds = $animal->feeds;
            $this->assertNotNull($feeds);
            $this->assertTrue($feeds->count() > 0);
        }
    }

    public function test_successful_animal_creation_without_relations(): void
    {
        $this->assertDatabaseCount('animals', 5);

        $animal = Animal::factory()->create();

        $this->assertNotNull($animal);
        $this->assertModelExists($animal);
        $this->assertCount(6, Animal::all());
    }

    public function test_successful_animal_creation_with_employees(): void
    {
        $this->assertDatabaseCount('animals', 5);

        $animal = Animal::factory()->create();

        $this->assertNotNull($animal);
        $this->assertModelExists($animal);
        $this->assertCount(6, Animal::all());
        $this->assertCount(0, $animal->employees);

        $employee = Employee::inRandomOrder()->first();
        $animal->employees()->attach($employee->id);
        $animal->refresh();
        $this->assertCount(1, $animal->employees);
    }

    public function test_successful_animal_creation_with_feeds(): void
    {
        $this->assertDatabaseCount('animals', 5);

        $animal = Animal::factory()->create();

        $this->assertNotNull($animal);
        $this->assertModelExists($animal);
        $this->assertCount(6, Animal::all());
        $this->assertCount(0, $animal->feeds);

        $feeds = Feed::inRandomOrder()->first();
        $animal->feeds()->attach($feeds->id, ['portion' => 100]);
        $animal->refresh();
        $this->assertCount(1, $animal->feeds);
    }

    public function test_successful_update_animal(): void
    {
        $this->assertDatabaseCount('animals', 5);
        $animal = Animal::inRandomOrder()->first();
        $this->assertModelExists($animal);
        $this->assertArrayHasKey('name', $animal->toArray());
        $beforeName = $animal->name;
        $animal->name = 'new name';
        $this->assertNotEquals($beforeName, $animal->name);
    }

    public function test_successful_delete_animal(): void
    {
        $this->assertDatabaseCount('animals', 5);
        $animal = Animal::inRandomOrder()->first();
        $this->assertModelExists($animal);

        $animalId = $animal->id;
        $animal->employees()->detach();
        $animal->feeds()->detach();
        $animal->delete();
        $this->assertModelMissing($animal);
        $this->assertNull(Animal::find($animalId));
        $this->assertDatabaseCount('animals', 4);
    }
}
