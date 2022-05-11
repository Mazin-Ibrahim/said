<?php

namespace App\Interfaces\Expense;

Interface ExpenseReportInterface {

    public function getExpensesByDay($day);
    public function getExpensesByMonth($month);
    public function getExpensesByYear($year);
    public function getExpensesByPeriod($startDate, $endDate);
    public function getLastExpensesReport();
}