<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Department\storeRequest;
use App\Http\Requests\Api\Department\updateRequest;
use App\Interfaces\Department\DepartmentRepositoryInterface;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentInterface;

    public function __construct(DepartmentRepositoryInterface $departmentInterface)
    {
        $this->departmentInterface = $departmentInterface;
    }

    public function index()
    {
        $departments = $this->departmentInterface->getAll();
        return inertia('Dashboard/Department/index',[
            'departments' => $departments
        ]);
  
    }

    public function create()
    {
        return inertia('Dashboard/Department/create');
    }

    public function store(storeRequest $request)
    {
        $this->departmentInterface->create($request->only(['name']));

        return redirect()->route('departments.index');
    }
    
    public function edit(Department $department)
    {
        
        return inertia('Dashboard/Department/edit',[
            'department' => $department
        ]);
    }

    public function update(Department $department, updateRequest $request)
    {
        
        $this->departmentInterface->update($request->only(['name']),$department);

        return redirect()->route('departments.index');
    }

    public function delete(Department $department)
    {
        $this->departmentInterface->delete($department);

        return redirect()->route('departments.index');
    }
   
}
