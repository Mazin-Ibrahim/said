<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Expense\storeRequest;
use App\Http\Requests\Api\Expense\updateRequest;
use App\Interfaces\Expense\ExpenseRepositoryInterface;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    protected $expenseInterface;

    public function __construct(ExpenseRepositoryInterface $expenseInterface)
    {
        $this->expenseInterface = $expenseInterface;
    }

    public function index()
    {
       $expenses = $this->expenseInterface->getAll();
         return response()->json($expenses, 200);
    }

    public function getExpense(Expense $expense)
    {
        $expense = $this->expenseInterface->getExpense($expense);
        return response()->json($expense, 200);
    }

    public function store(storeRequest $request)
    {
        $expense = $this->expenseInterface->create($request->only(['value', 'description', 'date']));
        return response()->json($expense, 200);
    }

    public function update(updateRequest $request, Expense $expense)
    {
       
        $expense = $this->expenseInterface->update($request->only(['value', 'description', 'date']), $expense);
        return response()->json($expense, 204);
    }

    public function delete(Expense $expense)
    {
        $expense = $this->expenseInterface->delete($expense);
        return response()->json($expense, 204);
    }
}
