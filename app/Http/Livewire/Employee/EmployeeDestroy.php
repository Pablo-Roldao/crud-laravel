<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use App\Repositories\EloquentEmployeesRepository;
use App\Repositories\EmployeesRepository;
use Livewire\Component;

class EmployeeDestroy extends Component
{

    public Employee $employee;
    private EmployeesRepository $employeesRepository;
    public bool $showModal = false;
    public string $errorMessage = '';

    protected $listeners = ['showModal' => 'showModal', 'closeModal' => 'closeModal'];

    public function boot(EmployeesRepository $employeesRepository): void
    {
        $this->employeesRepository = new EloquentEmployeesRepository();
    }

    public function showModal(): void
    {
        $this->resetErrorBag();
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetMessageError();
    }

    public function resetMessageError(): void
    {
        $this->errorMessage = '';
    }

    public function destroy(): void
    {
        try {
            $this->employeesRepository->delete($this->employee->getId());

            $this->dispatchBrowserEvent('event', [
                'title' => 'Funcionário(a) excluído(a) com sucesso!',
                'icon' => 'success',
                'iconColor' => 'red'
            ]);
            $this->redirect(route('employee.index'));

            $this->closeModal();
        } catch (\Exception $e) {
            $this->errorMessage = $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.employee.employee-destroy');
    }
}
