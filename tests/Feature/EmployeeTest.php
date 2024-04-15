<?php

namespace Tests\Feature;

use App\Models\Animal;
use App\Models\Employee;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(TestSeeder::class);
    }

    public function test_employees_reading_without_relations(): void
    {
        $this->assertDatabaseCount('employees', 3);
        $employees = Employee::all();
        $this->assertCount(3, $employees, 'Incorrect amount of employees');
        foreach ($employees as $employee) {
            $employeeArray = $employee->toArray();

            $this->assertIsArray($employeeArray);
            $this->assertArrayHasKey('id', $employeeArray);
            $this->assertIsInt($employeeArray['id']);
            $this->assertArrayHasKey('name', $employeeArray);
            $this->assertIsString($employeeArray['name']);
            $this->assertArrayHasKey('surname', $employeeArray);
            $this->assertIsString($employeeArray['surname']);
            $this->assertArrayHasKey('department', $employeeArray);
            $this->assertIsString($employeeArray['department']);
            $this->assertArrayHasKey('job', $employeeArray);
            $this->assertIsString($employeeArray['job']);
        }
    }

    public function test_employees_reading_with_animals(): void
    {
        $this->assertDatabaseCount('employees', 3);
        $employees = Employee::with('animals')->get();
        $this->assertCount(3, $employees, 'Incorrect amount of employees');
        foreach ($employees as $employee) {
            $this->assertModelExists($employee);

            $animals = $employee->animals;
            $this->assertNotNull($animals);
            $this->assertTrue($animals->count() > 0);
        }
    }

    public function test_successful_employee_creation_without_relations(): void
    {
        $this->assertDatabaseCount('employees', 3);

        $employee = Employee::factory()->create();

        $this->assertNotNull($employee);
        $this->assertModelExists($employee);
        $this->assertCount(4, Employee::all());
    }

    public function test_successful_employee_creation_with_animals(): void
    {
        $this->assertDatabaseCount('employees', 3);

        $employee = Employee::factory()->create();

        $this->assertNotNull($employee);
        $this->assertModelExists($employee);
        $this->assertCount(4, Employee::all());
        $this->assertCount(0, $employee->animals);

        $animal = Animal::inRandomOrder()->first();
        $employee->animals()->attach($animal->id);
        $employee->refresh();
        $this->assertCount(1, $employee->animals);
    }

    public function test_successful_update_employee(): void
    {
        $this->assertDatabaseCount('employees', 3);
        $employee = Employee::inRandomOrder()->first();
        $this->assertModelExists($employee);
        $this->assertArrayHasKey('name', $employee->toArray());
        $beforeName = $employee->name;
        $employee->name = 'new name';
        $this->assertNotEquals($beforeName, $employee->name);
    }

    public function test_successful_delete_employee(): void
    {
        $this->assertDatabaseCount('employees', 3);
        $employee = Employee::inRandomOrder()->first();
        $this->assertModelExists($employee);

        $employeeId = $employee->id;
        $employee->animals()->detach();
        $employee->delete();
        $this->assertModelMissing($employee);
        $this->assertNull(Employee::find($employeeId));
        $this->assertDatabaseCount('employees', 2);
    }
}
