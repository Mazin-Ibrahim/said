<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Location\storeRequest;
use App\Interfaces\Location\LocationRepositoryInterface;
use App\Models\Location;
use App\Models\Product;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    protected $locationInterface;

    public function __construct(LocationRepositoryInterface $locationRepositoryInterface)
    {
        $this->locationInterface = $locationRepositoryInterface;
    }


    public function index()
    {
        $locations = $this->locationInterface->getAll();

        return response()->json($locations, 200);
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
            'location_name',
            'customer_name'
        ]));

        return response()->json($location, 201);
    }

    public function show(Location $location)
    {
        $oneLoaction = $this->locationInterface->getLocation($location);

        return response()->json($oneLoaction, 200);
    }

    public function getLocationPaymentDetails(Location $location)
    {
        $location = $this->locationInterface->getPaymentDetails($location);

        return response()->json($location, 200);
    }

    public function collectionLocationPayment(Location $location, Request $request)
    {
        $location = $this->locationInterface->collectionLocationPayment($location, $request);

        return response()->json($location, 200);
    }

    public function updateProductsStatusBelongToLocation(Location $location, Request $request)
    {
        $request->validate([
            'products' => 'required|array',
            'products.*' => 'required',
        ]);
        $location = $this->locationInterface->updateStatusProduct($location, $request);

        return response()->json($location, 204);
    }


    public function deleteProductsFromLocation(Location $location, Request $request)
    {
        $request->validate([

            'qty' => 'required',
            'id' => 'required',
        ]);



        $product = Product::find($request->id);
        $product->qty += $request->qty;
        $product->save();


        $location->products()->wherePivot('product_id', '=', $request->id)->detach();


        return response()->json(null, 204);
    }


    public function updateProductsFromLoaction(Location $location, Request $request)
    {
        $request->validate([
            'qty' => 'required',
            'id' => 'required',
            'type' => 'required',
        ]);

        $product = Product::find($request->id);
        if ($request->type == 'add') {
            $product->qty -= $request->qty;
            $product->save();

            $pvoitQty =  $location->products()->where('product_id', $request->id)->first();
            $newQty = $pvoitQty->pivot->qty + $request->qty;

            $location->products()->updateExistingPivot($request->id, [
                'qty' => $newQty,
            ]);
        } else {
            $product->qty += $request->qty;
            $product->save();

            $pvoitQty =  $location->products()->where('product_id', $request->id)->first();
            $newQty = $pvoitQty->pivot->qty - $request->qty;

            $location->products()->updateExistingPivot($request->id, [
                'qty' => $newQty,
            ]);
        }
    }
}
