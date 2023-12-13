<?php

namespace App\Http\Livewire\Employee;

use App\Repositories\EloquentEmployeesRepository;
use App\Repositories\EmployeesRepository;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeIndex extends Component
{

    use WithPagination;

    public int $perPage = 10;
    public string $search = '';
    public string $orderBy = 'name';
    public int $orderAsc = 1;

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
