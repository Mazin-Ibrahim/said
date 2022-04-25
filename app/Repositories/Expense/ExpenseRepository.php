<?php


namespace App\Repositories\Expense;

use App\Interfaces\Expense\ExpenseReportInterface;
use App\Models\Expense;

use App\Interfaces\Expense\ExpenseRepositoryInterface;
use Carbon\Carbon;

class ExpenseRepository  implements ExpenseRepositoryInterface, ExpenseReportInterface {
    
        public function getAll() {
            return Expense::all();
        }
    
        public function getExpense($expense) {
            return $expense;
        }
    
        public function create($data) {
            return Expense::create($data);
        }
    
        public function update($data, $expense) {
            return $expense->update($data);
        }
    
        public function delete($expense) {
            return $expense->delete();
        }

        public function getExpensesByDay($day) {
            return Expense::whereDate('date', $day)->get();
        }

        public function getExpensesByMonth($month) {
            return Expense::whereMonth('date', $month)->get();
        }

        public function getExpensesByYear($year) {
            return Expense::whereYear('date', $year)->get();
        }

        public function getExpensesByPeriod($startDate, $endDate) {
           
            $startDate = Carbon::parse($startDate)->toDateTimeString();
            $endDate = Carbon::parse($endDate)->toDateTimeString();
            return Expense::whereBetween('date', [$startDate, $endDate])->get();
        }
    
}