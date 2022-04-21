<?php

namespace App\Repositories\Department;

use App\Interfaces\Department\DepartmentRepositoryInterface;
use App\Models\Department;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    public function getAll()
    {
        return Department::paginate(10);
    }

    public function getDepartment($department)
    {
        return $department;
    }

    public function create($data)
    {
        return Department::create($data);
    }

    public function update($data, $department)
    {
        return $department->update($data);
    }

    public function delete($department)
    {
        return $department->delete();
    }
}
