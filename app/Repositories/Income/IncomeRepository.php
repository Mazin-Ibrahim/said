<?php

namespace App\Repositories\Income;

use App\Interfaces\Income\IncomeRepositoryInterface;
use App\Models\Income;

class IncomeRepository implements IncomeRepositoryInterface
{
    public function getAll()
    {
        return Income::all();
    }

    public function getIncome($income)
    {
        return $income;
    }

    public function create($data)
    {
        return Income::create($data);
    }

    public function update($data, $income)
    {
       return $income->update($data);
    }

    public function delete($income)
    {
       return $income->delete();
    }
}
