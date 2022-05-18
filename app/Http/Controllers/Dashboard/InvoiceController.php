<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Invoice\storeRequest;
use App\Interfaces\Invoice\InvocieRepositoryInterface;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvoiceController extends Controller
{
    protected $invocieInterface;
    public function __construct(InvocieRepositoryInterface $invocieInterface)
    {
        $this->invocieInterface = $invocieInterface;
    }

    public function index(Request $request)
    {
        
        $invoices = $this->invocieInterface->getAll($request);
        return Inertia::render('Dashboard/Invoice/index', [
            'invoices' => $invoices,
        ]);
    }
 
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
        $invoice = $this->invocieInterface->create($request->only(
            ['customer_id','total','discount','total_after_discount','type_of_payment','invoce_items']
        ));

        dd($invoice);


    }
    
}
