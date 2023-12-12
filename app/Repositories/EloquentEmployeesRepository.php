<?php

namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class EloquentEmployeesRepository implements EmployeesRepository
{

    public function getAll(): Collection
    {
        return Employee::all();
    }

    public function getById($id): Employee
    {
        return Employee::findOrFail($id);
    }

    public function delete($id): void
    {
        Employee::findOrFail($id)->delete();
    }

    public function create(array $data): void
    {
        Employee::create($data);
    }

    public function update($id, array $newData): void
    {
        Employee::findOrFail($id)->fill($newData)->save();
    }

    public function search(string $search): Builder
    {
        return empty($search)
            ? Employee::query()
            : Employee::query()
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('cpf', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%');
    }
}
