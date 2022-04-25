<?php


namespace App\Repositories\Expense;
use App\Models\Expense;

use App\Interfaces\Expense\ExpenseRepositoryInterface;

class ExpenseRepository  implements ExpenseRepositoryInterface {
    
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
    
}