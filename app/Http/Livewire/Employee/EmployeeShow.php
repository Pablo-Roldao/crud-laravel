<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use App\Repositories\EloquentEmployeesRepository;
use App\Repositories\EmployeesRepository;
use Livewire\Component;

class EmployeeShow extends Component
{

    private EmployeesRepository $employeesRepository;
    public Employee $employee;

    public function mount(int $id): void
    {
        $this->employee = $this->employeesRepository->getById($id);
    }

    public function boot(EmployeesRepository $employeesRepository): void
    {
        $this->employeesRepository = new EloquentEmployeesRepository();
    }

    public function render()
    {
        return view('livewire.employee.employee-show');
    }
}
