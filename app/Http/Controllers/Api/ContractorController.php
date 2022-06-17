<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contractor;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    public function index()
    {
        return Contractor::with('expenses', 'location')->get();
    }

    public function show(Contractor $contractor)
    {
        return $contractor->load('expenses', 'location');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'work_starting_date' => 'required|date',
            'agreement_amount' => 'required',
            'description' => 'required',
        ]);
        $contractor = Contractor::create([
            'name' => $request->name,
            'location_name' => $request->location_name,
            'location_id' => $request->location_id,
            'work_starting_date' => $request->work_starting_date,
            'agreement_amount' => $request->agreement_amount,
            'description' => $request->description,
        ]);

        return response()->json($contractor, 201);
    }

    public function update(Request $request, Contractor $contractor)
    {
        $request->validate([
            'name' => 'required',
            'work_starting_date' => 'required|date',
            'agreement_amount' => 'required',
            'description' => 'required',
        ]);
        $contractor->update([
            'name' => $request->name,
            'location_name' => $request->location_name,
            'location_id' => $request->location_id,
            'work_starting_date' => $request->work_starting_date,
            'agreement_amount' => $request->agreement_amount,
            'description' => $request->description
        ]);

        return response()->json($contractor->load('expenses'), 200);
    }

    public function delete(Contractor $contractor)
    {
        $contractor->delete();

        return response()->json(null, 204);
    }
}
