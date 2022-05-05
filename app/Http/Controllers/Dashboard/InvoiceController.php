<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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
            'products' => $products
        ]);
    }
    
}
