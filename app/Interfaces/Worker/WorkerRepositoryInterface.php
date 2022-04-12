<?php

namespace App\Interfaces\Worker;

interface WorkerRepositoryInterface
{
    public function getAll();

    public function getWorker($worker);

    public function create($data);

    public function update($data, $worker);

    public function delete($worker);
}
