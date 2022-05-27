<?php


namespace App\Repositories\Worker;

use App\Interfaces\Worker\WorkerDebtInterface;
use App\Interfaces\Worker\WorkerRepositoryInterface;
use App\Models\Worker;

class WorkerRepository implements WorkerRepositoryInterface ,WorkerDebtInterface
{
    public function getAll()
    {
        return Worker::with('department')->get();
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

    public function createDebt($data,$worker)
    {
        $worker->debts()->create([
            'value' => $data['value'],
            'date' => $data['date']
        ]);

        return $worker->load('debts');
    }

    public function getWorkesDebts($worker)
    {
       return $worker->load('debts');
    }
}
