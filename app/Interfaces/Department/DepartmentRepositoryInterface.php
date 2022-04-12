<?php


namespace App\Interfaces\Department;

interface DepartmentRepositoryInterface
{
    public function getAll();
    public function getDepartment($department);
    public function create($request);
    public function update($request, $department);
    public function delete($id);
}
