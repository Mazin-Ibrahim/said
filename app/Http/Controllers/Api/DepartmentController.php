<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Department\storeRequest;
use App\Http\Requests\Api\Department\updateRequest;
use App\Interfaces\Department\DepartmentRepositoryInterface;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentRepository;
    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function index()
    {
        $departments =   $this->departmentRepository->getAll();
        return response()->json($departments, 200);
    }

    public function getDepartment(Department $department)
    {
        $department =   $this->departmentRepository->getDepartment($department);
        return response()->json($department, 200);
    }

    public function store(storeRequest $request)
    {
        $department =   $this->departmentRepository->create($request->only('name'));
        return response()->json($department, 201);
    }
    public function update(updateRequest $request, Department $department)
    {
        $department =   $this->departmentRepository->update($request->only('name'), $department);
        return response()->json($department, 204);
    }
    public function delete(Department $department)
    {
        $this->departmentRepository->delete($department);
        return response()->json(null, 204);
    }
}
