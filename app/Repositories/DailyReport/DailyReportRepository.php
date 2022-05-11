<?php 

namespace App\Repositories\DailyReport;

use App\Interfaces\DailyReport\DailyReportInterface;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Invoice;
use Carbon\Carbon;

class DailyReportRepository implements DailyReportInterface {
   public function getInvoicesAndIncomesAndExpensesDaily()
   {
      
       $expensesDay = Expense::whereDate('created_at', Carbon::today())->sum('value');
       $incomesDay   = Income::whereDate('created_at', Carbon::today())->sum('value');
       $totalBuyInvoices = Invoice::whereDate('created_at', Carbon::today())->sum('total');
       $countInvoices = Invoice::whereDate('created_at', Carbon::today())->count();

       return [
           'expensesDay' => $expensesDay,
           'incomesDay' => $incomesDay,
           'totalBuyInvoces' =>$totalBuyInvoices,
           'countInvoices' =>$countInvoices
       ];
   }
}


