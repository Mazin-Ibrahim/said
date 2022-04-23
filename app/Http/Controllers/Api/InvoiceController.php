<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Invoice\storeRequest;
use App\Interfaces\Invoice\InvocieRepositoryInterface;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected $invocieInterface;
    public function __construct(InvocieRepositoryInterface $invocieInterface)
    {
        $this->invocieInterface = $invocieInterface;
    }

    public function index()
    {
        $invoices = $this->invocieInterface->getAll();
        return response()->json($invoices,200);
    }

    public function getInvoice(Invoice $invoice) 
    {
       
        return $this->invocieInterface->getInvoice($invoice);
    }

    public function store(storeRequest $request)
    {
        
        $invoice = $this->invocieInterface->create($request->only(
            ['customer_id','total','discount','total_after_discount','type_of_payment','invoce_items']
        ));

     
        return response()->json($invoice,201);
    }
   
  
}
