<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContractorExpenseController extends Controller
{
    public function createExpense(Request $request, Contractor $contractor)
    {

        $request->validate([
            'date' => 'required|date',
            'amount_paid' => 'required',
            'description' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $expense = $contractor->expenses()->create([
                'date' => $request->date,
                'amount_paid' => $request->amount_paid,
                'description' => $request->description,
            ]);
            DB::commit();

            return response()->json($contractor->load('expenses'), 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
