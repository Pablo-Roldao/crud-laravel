<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use App\Repositories\EloquentEmployeesRepository;
use App\Repositories\EmployeesRepository;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class EmployeeEdit extends Component
{

    public Employee $employee;

    private EmployeesRepository $employeesRepository;

    public bool $showModal = false;
    public string $errorMessage = '';

    protected $listeners = ['showModal' => 'showModal', 'closeModal' => 'closeModal'];

    protected array $rules = [
        'employee.name' => 'required|min:3',
        'employee.cpf' => 'required|min:14',
        'employee.phone' => 'required|min:11',
        'employee.email' => 'required|email',
        'employee.birth_date' => 'required',
        'employee.gender' => 'required'
    ];

    public function mount(): void
    {
        $this->employee->birth_date = date('d/m/Y', $this->employee->getBirthDate());
    }

    public function boot(EmployeesRepository $employeesRepository): void
    {
        $this->employeesRepository = new EloquentEmployeesRepository();
    }

    /**
     * @throws ValidationException
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function showModal(): void
    {
        $this->resetErrorBag();
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
    }

    public function validateBirthDate(string $birthDateFormatted): int
    {
        $birthDateTimestamp = $birthDateFormatted;
        $format = "d/m/Y";
        $birthDateTimestamp = \DateTime::createFromFormat($format, $birthDateTimestamp);

        if (!$birthDateTimestamp || $birthDateTimestamp->format($format) !== $birthDateFormatted || $birthDateTimestamp->getTimestamp() > now()->getTimestamp()) {
            throw new \Exception('Invalid birth date');
        }

        return $birthDateTimestamp->getTimestamp();
    }

    public function resetErrorMessage(): void
    {
        $this->errorMessage = '';
    }

    public function update(): void
    {
        $this->validate();

        try {
            $birthDate = $this->validateBirthDate($this->employee->birth_date);
            $this->employee->birth_date = $birthDate;

            $this->employeesRepository->update($this->employee->getId(), $this->employee->toArray());

            $this->dispatchBrowserEvent('event', [
                'title' => 'Funcionário(a) atualizado(a) com sucesso!',
                'icon' => 'success',
                'iconColor' => 'green'
            ]);

            $this->closeModal();
        } catch (\Exception $e) {
            $this->errorMessage = $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.employee.employee-edit');
    }
}
