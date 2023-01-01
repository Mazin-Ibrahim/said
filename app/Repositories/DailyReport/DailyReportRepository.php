<?php

namespace App\Repositories\DailyReport;

use App\Interfaces\DailyReport\DailyReportInterface;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Invoice;
use Carbon\Carbon;

class DailyReportRepository implements DailyReportInterface
{
    public function getInvoicesAndIncomesAndExpensesDaily()
    {
        $expensesDay = (float)Expense::whereDate('created_at', Carbon::today())->sum('value');
        $incomesDay   = (float)Income::whereDate('created_at', Carbon::today())->sum('value');
        $totalBuyInvoices = (float)Invoice::whereDate('created_at', Carbon::today())->where('type_of_payment', '!=', 'credit')->sum('total');
        $countInvoices = Invoice::whereDate('created_at', Carbon::today())->count();

        return [
            'expensesDay' => $expensesDay,
            'incomesDay' => $incomesDay,
            'totalBuyInvoces' => $totalBuyInvoices,
            'countInvoices' => $countInvoices
        ];
    }
}
