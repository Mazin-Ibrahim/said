<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use App\Models\Worker;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'salary' => 'required|numeric',
            'date' => 'required|date',
            'type' => 'required|string',
            'description' => 'required|string',
        ]);

        $salary = Salary::create([
            'worker_id' => $request->worker_id,
            'salary' => $request->salary,
            'date' => $request->date,
            'type' => $request->type,
            'description' => $request->description,
            'worker_name' => $request->worker_name,
        ]);

        return response()->json($salary, 201);
    }

    public function index()
    {
        $salaries = Salary::with('worker')->get();

        return response()->json($salaries, 200);
    }

    public function show(Salary $salary)
    {
        return response()->json($salary, 200);
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([

            'salary' => 'required|numeric',
            'date' => 'required|date',
            'type' => 'required|string',
            'description' => 'required|string',

        ]);

        $salary->update([
            'worker_id' => $request->worker_id,
            'salary' => $request->salary,
            'date' => $request->date,
            'type' => $request->type,
            'description' => $request->description,
            'worker_name' => $request->worker_name,
        ]);

        return response()->json($salary, 200);
    }

    public function delete(Salary $salary)
    {
        $salary->delete();

        return response()->json(null, 204);
    }

    public function getWorkerSalaries(Worker $worker)
    {
        $salaries = $worker->load('salaries');

        return response()->json($salaries, 200);
    }
}
