<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dollar;
use Illuminate\Http\Request;

class DollarController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required'
        ]);

        $dollar = Dollar::create([
            'value' => $request->get('value'),
        ]);

        return response()->json($dollar, 201);
    }


    public function getDollar(Dollar $dollar)
    {
        return $dollar;
    }


    public function update(Request $request, Dollar $dollar)
    {
        $request->validate([
            'value' => 'required'
        ]);

        $dollar->update([
            'value' => $request->get('value'),
        ]);

        return response()->json($dollar, 204);
    }
}
