<?php

namespace App\Repositories\Income;

use App\Interfaces\Income\IncomeReportInterface;
use App\Interfaces\Income\IncomeRepositoryInterface;
use App\Models\Income;
use Carbon\Carbon;

class IncomeRepository implements IncomeRepositoryInterface,IncomeReportInterface
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

    public function getIncomesByDay($day) {
        return Income::whereDate('date', $day)->get();
    }

    public function getIncomesByMonth($month) {
        return Income::whereMonth('date', $month)->get();
    }

    public function getIncomesByYear($year) {
        return Income::whereYear('date', $year)->get();
    }

    public function getIncomesByPeriod($startDate, $endDate) {
       
        $startDate = Carbon::parse($startDate)->toDateTimeString();
        $endDate = Carbon::parse($endDate)->toDateTimeString();
        return Income::whereBetween('date', [$startDate, $endDate])->get();
    }
}
