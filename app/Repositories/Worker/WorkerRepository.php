<?php


namespace App\Repositories\Worker;

use App\Interfaces\Worker\WorkerRepositoryInterface;
use App\Models\Worker;

class WorkerRepository implements WorkerRepositoryInterface
{
    public function getAll()
    {
        return Worker::all();
    }

    public function getWorker($worker)
    {
        return $worker;
    }

    public function create($data)
    {
        return Worker::create($data);
    }

    public function update($data, $worker)
    {
        $worker->update($data);
    }

    public function delete($worker)
    {
        $worker->delete();
    }
}
