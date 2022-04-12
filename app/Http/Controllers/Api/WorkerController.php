<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Worker\storeRequest;
use App\Http\Requests\Api\Worker\updateRequest;
use App\Interfaces\Worker\WorkerRepositoryInterface;
use App\Models\Worker;

class WorkerController extends Controller
{
    protected $workerRepository;

    public function __construct(WorkerRepositoryInterface $workerRepository)
    {
        $this->workerRepository = $workerRepository;
    }

    public function index()
    {
        $workers = $this->workerRepository->getAll();
        return response()->json($workers, 200);
    }

    public function getWorker(Worker $worker)
    {
        $worker = $this->workerRepository->getWorker($worker);
        return response()->json($worker, 200);
    }

    public function store(storeRequest $request)
    {
        $worker =  $this->workerRepository->create($request->only('name', 'department_id', 'salary', 'phone', 'description'));
        return response()->json($worker, 201);
    }

    public function update(updateRequest $request, Worker $worker)
    {
        $worker = $this->workerRepository->update($request->only('name', 'department_id', 'salary', 'phone', 'description'), $worker);
        return response()->json($worker, 204);
    }

    public function delete(Worker $worker)
    {
        $this->workerRepository->delete($worker);
        return response()->json(null, 204);
    }
}
