<?php


namespace App\Interfaces\Income;


interface IncomeRepositoryInterface
{
    public function getAll();
    public function getIncome($income);
    public function create($request);
    public function update($request, $income);
    public function delete($income);
}