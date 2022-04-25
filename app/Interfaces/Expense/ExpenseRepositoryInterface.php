<?php

namespace App\Interfaces\Expense;


interface ExpenseRepositoryInterface
{
    public function getAll();
    public function getExpense($expense);
    public function create($request);
    public function update($request, $expense);
    public function delete($expense);
}