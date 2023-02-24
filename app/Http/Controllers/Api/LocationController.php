<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Location\storeRequest;
use App\Interfaces\Location\LocationRepositoryInterface;
use App\Models\Location;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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

    public function addPoductsToLocation(Location $location, Request $request)
    {
        $request->validate([
            'products' => 'required|array',
            'products.*' => 'required',
        ]);

        $data = $request->all();

        collect($data['products'])->each(function ($item) {
            if ($item['status'] == 'delivered') {
                $product = Product::find($item['id']);
                $data['productsQty1'] = $product->qty;
                $data['ItemQty'] = $item['qty'];
                $product->qty = $product->qty - $item['qty'];
                $product->save();
                $data['productsQty2'] = $product->qty;
            }
        });
        $productLocationData = collect($data['products'])->groupBy('id')->toArray();
        $productLocationDataCollection = new Collection($productLocationData);
        $products = $productLocationDataCollection->map(function ($item, $key) {
            return collect($item)->map(function ($item) {
                return [

                    'qty' => $item['qty'],
                    'status' => $item['status']
                ];
            })->collapse();
        })->toArray();

        $location->products()->attach($products);

        return $location->load('products', 'paymentDetails');
    }
    public function updateLocation(Request $request, Location $location)
    {
        $request->validate([
            'contract_price' => 'required',
            'description' => 'required',
            'received_date' => 'required|date',
            'delivery_date' => 'required|date',
        ]);

        $data = $request->all();

        $location->update([
            'customer_id' => $data['customer_id'] ?? null,
            'address' => $data['address'] ?? null,
            'description' => $data['description'] ?? null,
            'contract_price' => $data['contract_price'] ?? null,
            'received_date' => $data['received_date'] ?? null,
            'delivery_date' => $data['delivery_date'] ?? null,
            'location_name' => $data['location_name'] ?? null,
            'customer_name' => $data['customer_name']?? null
        ]);
            
        return response()->json(null, 204);
    }

        public function delete(Location $location)
        {
            $location->paymentDetails()->delete();

            if ($location->customer()->exists()) {
                $location->customer()->delete();
            }

            $location->products()->delete();
          

            $location->locationExpenses()->delete();

            $location->delete();

            return response()->json(null, 204);
        }
}
