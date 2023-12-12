<?php

namespace App\Repositories;

interface EmployeesRepository
{

    public function getAll();
    public function getById($id);
    public function delete($id);
    public function create(array $data);
    public function update($id, array $newData);
    public function search(string $search);

}
