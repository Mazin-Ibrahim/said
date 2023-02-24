<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Location;
use App\Models\LocationExpense;
use Illuminate\Http\Request;

class LocationExpenseController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'value' => 'required',
            'location_id' => 'required|exists:locations,id',
        ]);

        $location = Location::find($request->location_id);

        $location->locationExpenses()->create([
            'date' => $request->date,
            'value' => $request->value,
            'description' => $request->description
        ]);

        return $location->load('locationExpenses');
    }

    public function update(LocationExpense $locationExpense, Request $request)
    {
        $request->validate([
            'date' => 'required',
            'value' => 'required',
            'location_id' => 'required|exists:locations,id',
        ]);

        $location = Location::find($request->location_id);
           
        $locationExpense->update([
            'date' => $request->date,
            'value' => $request->value,
            'description' => $request->description,
            'location_id' => $request->location_id
        ]);
       

        return $location->load('locationExpenses');
    }


    public function getlocationExpenses(Location $location)
    {
        return $location->load('locationExpenses');
    }


    public function getAllExpenses()
    {
        $expenses = LocationExpense::all();

        return response()->json($expenses, 200);
    }

    public function delete(LocationExpense $locationExpense)
    {
        $locationExpense->delete();

        return response()->json(null, 204);
    }
}
