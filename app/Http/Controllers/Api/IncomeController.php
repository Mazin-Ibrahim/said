<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Income\storeRequest;
use App\Http\Requests\Api\Income\updateRequest;
use App\Interfaces\Income\IncomeRepositoryInterface;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    protected $incomeInterface;

    public function __construct(IncomeRepositoryInterface $incomeInterface)
    {
        $this->incomeInterface = $incomeInterface;
    }

    public function index()
    {
        $incomes = $this->incomeInterface->getAll();

        return response()->json($incomes, 200);
    }

    public function show(Income $income)
    {
        $income = $this->incomeInterface->getIncome($income);

        return response()->json($income, 200);
    }

    public function store(storeRequest $request)
    {
        $income = $this->incomeInterface->create($request->only('value', 'description', 'date'));

        return response()->json($income, 201);
    }

    public function update(updateRequest $request, Income $income)
    {
        $income = $this->incomeInterface->update($request->only('value', 'description', 'date'), $income);

        return response()->json($income, 204);
    }

    public function delete(Income $income)
    {
        $income = $this->incomeInterface->delete($income);

        return response()->json($income, 204);
    }
}
