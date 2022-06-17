<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Creditor;
use Illuminate\Http\Request;

class CreditorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'debit_amount' => 'required',
            'remaining' => 'required',
            'description' => 'required',
        ]);


        $creditor =  Creditor::create([
            'name' => $request->name,
            'date' => $request->date,
            'debit_amount' => $request->debit_amount,
            'remaining' => $request->remaining,
            'description' => $request->description,
        ]);

        return response()->json($creditor, 201);
    }

    public function index()
    {
        $creditors = Creditor::all();

        return response()->json($creditors, 200);
    }

    public function show($creditor)
    {

        $creditor = Creditor::find($creditor);
        return response()->json($creditor->load('creditorDetails'), 200);
    }

    public function update(Request $request, Creditor $creditor)
    {


        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'debit_amount' => 'required',
            'remaining' => 'required',
            'description' => 'required',
        ]);

        $creditor->update([
            'name' => $request->name,
            'date' => $request->date,
            'debit_amount' => $request->debit_amount,
            'remaining' => $request->remaining,
            'description' => $request->description,
        ]);

        return response()->json($creditor, 200);
    }


    public function delete($creditor)
    {


        $creditor->delete();

        return response()->json(null, 204);
    }
}
