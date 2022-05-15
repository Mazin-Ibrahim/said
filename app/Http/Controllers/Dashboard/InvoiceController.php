<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Invoice\storeRequest;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvoiceController extends Controller
{
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return Inertia('Dashboard/Invoice/create',[
            'customers' => $customers,
            'products' => $products->map(function($product){
                return [
                    'productQty' => 1,
                    'id' => $product->id,
                    'qty' => $product->qty,
                    'sell_price' => $product->sell_price,
                    'name' => $product->name
                ];
            })
        ]);
    }


    public function store(storeRequest $request)
    {
        dd($request->all());
    }
    
}
