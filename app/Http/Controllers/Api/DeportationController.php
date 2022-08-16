<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Deportation\DeportationRepositoryInterface;
use App\Models\Deportation;
use Illuminate\Http\Request;

class DeportationController extends Controller
{
    protected $deportationInterface;


    public function __construct(DeportationRepositoryInterface $deportationInterface)
    {
        $this->deportationInterface = $deportationInterface;
    }

    public function index()
    {
        $deportations = $this->deportationInterface->getAll();

        return response()->json($deportations, 200);
    }

    public function show($deportation)
    {
        $deportation = $this->deportationInterface->getDeportation($deportation);

        return response()->json($deportation, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'product_name' => 'required',
            'value' => 'required',
            'deported_name' => 'required',
        ]);
        $deportation = $this->deportationInterface->create($request);

        return response()->json($deportation->load('location'), 201);
    }

    public function update(Request $request, Deportation $deportation)
    {
        $request->validate([
            'description' => 'required',
            'product_name' => 'required',
            'value' => 'required',
            'deported_name' => 'required',
        ]);
        $deportation = $this->deportationInterface->update($request, $deportation);

        return response()->json($deportation, 200);
    }

    public function delete($deportation)
    {
        $this->deportationInterface->delete($deportation);

        return response()->json(null, 204);
    }
}
