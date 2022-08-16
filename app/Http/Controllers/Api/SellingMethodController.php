<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SellingMethod;
use Illuminate\Http\Request;

class SellingMethodController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $sellingMethod = new SellingMethod();
        $sellingMethod->name = $request->name;
        $sellingMethod->save();

        return response()->json($sellingMethod, 201);
    }
 
    public function index()
    {
        $sellingMethods = SellingMethod::all();

        return response()->json($sellingMethods, 200);
    }

    public function show($id)
    {
        $sellingMethod = SellingMethod::find($id);

        if (!$sellingMethod) {
            return response()->json(['message' => 'Selling method not found'], 404);
        }

        return response()->json($sellingMethod, 200);
    }

    public function update(Request $request, SellingMethod $sellingMethod)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);



        $sellingMethod->name = $request->name;
        $sellingMethod->save();

        return response()->json($sellingMethod, 200);
    }

    public function delete(SellingMethod $sellingMethod)
    {
        $sellingMethod->delete();

        return response()->json(null, 204);
    }
}
