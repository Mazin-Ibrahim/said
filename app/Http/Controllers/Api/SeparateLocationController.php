<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeparateLocationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'contract_price' => 'required',
            'description' => 'required',
            'received_date' => 'required|date',
            'delivery_date' => 'required|date',
        ]);

        


        DB::beginTransaction();
        try {
            $location = Location::create([
                'customer_id' => $request->customer_id,
                'address' => $request->address,
                'description' => $request->description,
                'contract_price' => $request->contract_price,
                'received_date' => $request->received_date,
                'delivery_date' => $request->delivery_date,
                'location_name' => $request->location_name,
                'customer_name' => $request->customer_name
            ]);
            
              
            if ($request->has('payment_details') && $request->filled('payment_details') && $request->input('payment_details') != null) {
                collect($request->payment_details)->each(function ($payment) use ($location) {
                    $location->paymentDetails()->create([
                        'amount' => $payment['amount'],
                        'payment_received_date' => $payment['payment_received_date'],
                    ]);
                });
            }

            DB::commit();
            return $location->load('paymentDetails');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }


    public function assingProductsToLocation(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
            'products.*' => 'required',
            'location_id' => 'required'
        ]);

        
        $productLocationData = collect($request->products)->groupBy('id')->toArray();
        $productLocationDataCollection = new Collection($productLocationData);
        
        $products = $productLocationDataCollection->map(function ($item, $key) {
            return collect($item)->map(function ($item) {
                return [

                    'qty' => $item['qty'],
                    'status' => $item['status']
                ];
            })->collapse();
        })->toArray();
    
        foreach ($request->products as $item) {
            $product = Product::find($item['id']);
            $product->qty = $product->qty - $item['qty'];
            $product->save();
        }

        $location = Location::find($request->location_id);
        $location->products()->attach($products);

        return $location->load('products');
    }
}
