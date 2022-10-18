<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Worker\storeRequest;
use App\Http\Requests\Api\Worker\updateRequest;
use App\Interfaces\Worker\WorkerRepositoryInterface;
use App\Models\Department;
use App\Models\Worker;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WorkerController extends Controller
{
    protected $workerInterface;

    public function __construct(WorkerRepositoryInterface $workerInterface)
    {
        $this->workerInterface = $workerInterface;
    }

    public function index()
    {
        $workers = $this->workerInterface->getAll();
        return inertia('Dashboard/Worker/index', ['workers' => $workers]);
    }

    public function create()
    {
        $departments = Department::all();
        return inertia('Dashboard/Worker/create', [
            'departments' => $departments
        ]);
    }

    public function store(storeRequest $request)
    {
        $this->workerInterface->create($request->only(['name', 'department_id', 'salary', 'phone', 'description']));
        return redirect()->route('workers.index');
    }

    public function edit(Worker $worker)
    {
        $departments = Department::all();
        return inertia('Dashboard/Worker/edit', [
            'worker' => $worker,
            'departments' => $departments
        ]);
    }

    public function update(updateRequest $request, Worker $worker)
    {
        $this->workerInterface->update($request->only(['name', 'department_id', 'salary', 'phone', 'description']), $worker);
        return redirect()->route('workers.index');
    }

    public function delete(Worker $worker)
    {
        $this->workerInterface->delete($worker);
        return redirect()->route('workers.index');
    }

    public function getAllWorkers()
    {
        $workers = Worker::all();

        return Inertia::render('Dashboard/Worker/All', [
            'workers' => $workers
        ]);
    }
}
