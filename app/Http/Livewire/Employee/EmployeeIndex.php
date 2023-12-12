<?php

namespace App\Http\Livewire\Employee;

use App\Repositories\EloquentEmployeesRepository;
use App\Repositories\EmployeesRepository;
use Livewire\Component;

class EmployeeIndex extends Component
{

    public int $perPage = 10;
    public string $search = '';
    public string $orderBy = 'name';
    public bool $orderAsc = true;

    private EmployeesRepository $employeesRepository;

    public function boot(EmployeesRepository $employeesRepository): void
    {
        $this->employeesRepository = new EloquentEmployeesRepository();
    }

    public function render()
    {
        return view('livewire.employee.employee-index', [
            'employees' => $this->employeesRepository->search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
    }
}
