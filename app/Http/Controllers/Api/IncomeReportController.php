<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Income\IncomeReportInterface;
use Illuminate\Http\Request;

class IncomeReportController extends Controller
{
    protected $incomeReportInterface;

    public function __construct(IncomeReportInterface $incomeReportInterface)
    {
        $this->incomeReportInterface = $incomeReportInterface;
    }

    public function getIncomesByDay(Request $request)
    {
        $day = $request->day;
        return $this->incomeReportInterface->getIncomesByDay($day);
    }

    public function getIncomesByMonth(Request $request)
    {
        $month = $request->month;
        return $this->incomeReportInterface->getIncomesByMonth($month);
    }

    public function getIncomesByYear(Request $request)
    {
        $year = $request->year;
        return $this->incomeReportInterface->getIncomesByYear($year);
    }

    public function getIncomesByPeriod(Request $request)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        return $this->incomeReportInterface->getIncomesByPeriod($startDate, $endDate);
    }
}
