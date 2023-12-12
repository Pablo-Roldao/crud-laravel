<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Repositories\EloquentEmployeesRepository;
use App\Repositories\EmployeesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeTest extends TestCase
{

    use RefreshDatabase;

    public EmployeesRepository $employeesRepository;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->employeesRepository = new EloquentEmployeesRepository();
    }

    public function testCreateEmployee(): void
    {
        $employee = Employee::factory()->make();

        $this->employeesRepository->create($employee->toArray());

        $this->assertDatabaseHas('employees', $employee->toArray());
    }

    public function testUpdateEmployee(): void
    {
        $employee = Employee::factory()->create();

        $newEmployee = Employee::factory()->make();

        $this->employeesRepository->update($employee->getId(), $newEmployee->toArray());

        $this->assertDatabaseMissing('employees', $employee->toArray());
        $this->assertDatabaseHas('employees', $newEmployee->toArray());
    }

    public function testDeleteEmployee(): void
    {
        $employee = Employee::factory()->create();

        $this->employeesRepository->delete($employee->getId());

        $this->assertDatabaseMissing('employees', $employee->toArray());
    }

    public function testGetEmployeeById(): void
    {
        $employee = Employee::factory()->create();

        $foundEmployee = $this->employeesRepository->getById($employee->getId());

        $this->assertEquals($employee->toArray(), $foundEmployee->toArray());
    }

}
