<?php 

namespace App\Interfaces\Income;



interface IncomeReportInterface {
    public function getIncomesByDay($day);
    public function getIncomesByMonth($month);
    public function getIncomesByYear($year);
    public function getIncomesByPeriod($startDate, $endDate);
}