<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Expense\ExpenseReportInterface;
use Illuminate\Http\Request;

class ExpenseReportController extends Controller
{
    protected $expenseReportInterface;

    public function __construct(ExpenseReportInterface $expenseReportInterface)
    {
        $this->expenseReportInterface = $expenseReportInterface;
    }

    public function getExpensesByDay(Request $request)
    {
        $day = $request->day;
        return $this->expenseReportInterface->getExpensesByDay($day);
    }

    public function getExpensesByMonth(Request $request)
    {
        $month = $request->month;
        return $this->expenseReportInterface->getExpensesByMonth($month);
    }

    public function getExpensesByYear(Request $request)
    {
        $year = $request->year;
        return $this->expenseReportInterface->getExpensesByYear($year);
    }

    public function getExpensesByPeriod(Request $request)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        return $this->expenseReportInterface->getExpensesByPeriod($startDate, $endDate);
    }
}
