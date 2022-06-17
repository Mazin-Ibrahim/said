<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Creditor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreditorDetailsController extends Controller
{
    public function creditorPayment(Request $request, Creditor $creditor)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'date' => 'required|date',
                'amount_paid' => 'required',
                'description' => 'required',
            ]);

            $creditor->remaining = $creditor->debit_amount - $request->amount_paid;
            $creditor->save();

            $creditor->creditorDetails()->create([
                'date' => $request->date,
                'amount_paid' => $request->amount_paid,
                'description' => $request->description,
            ]);

            DB::commit();

            return response()->json($creditor->load('creditorDetails'), 201);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
