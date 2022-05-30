<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Location\storeRequest;
use App\Interfaces\Location\LocationRepositoryInterface;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    protected $locationInterface;

   public function __construct(LocationRepositoryInterface $locationRepositoryInterface){
           $this->locationInterface = $locationRepositoryInterface;
    }


    public function index()
    {
        $locations = $this->locationInterface->getAll();

        return response()->json($locations,200);
    }


    public function store(storeRequest $request)
    {
        
       $location =  $this->locationInterface->create($request->only([
             'customer_id',
             'address',
             'contract_price',
             'description',
             'received_date',
             'delivery_date',
             'products',
             'payment_details',
         ]));

         return response()->json($location,201);
    }

    public function show(Location $location)
    {
        $oneLoaction = $this->locationInterface->getLocation($location);

        return response()->json($oneLoaction,200);
    }
}


