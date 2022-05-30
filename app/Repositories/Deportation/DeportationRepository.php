<?php

namespace App\Repositories\Deportation;

use App\Interfaces\Deportation\DeportationRepositoryInterface;
use App\Models\Deportation;

class DeportationRepository implements DeportationRepositoryInterface
{
    public function getAll()
    {
        return Deportation::with('location')->get();
    }

    public function getDeportation($deportation)
    {
        return $deportation->load('location');
    }

    public function create($request)
    {
        return Deportation::create($request->all());
    }

    public function update($request, $deportation)
    {
       return $deportation->update($request->all());
    }

    public function delete($deportation)
    {
       return  $deportation->delete();
    }
}