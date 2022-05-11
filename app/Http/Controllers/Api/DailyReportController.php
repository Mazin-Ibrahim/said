<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\DailyReport\DailyReportInterface;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    protected $dailyReportInterface;

    public function __construct(DailyReportInterface $dailyReportInterface){
        $this->dailyReportInterface = $dailyReportInterface;
    }

    public function getDailyReports()
    {
       $dailyReports = $this->dailyReportInterface->getInvoicesAndIncomesAndExpensesDaily();

       return $dailyReports;
    }
}
