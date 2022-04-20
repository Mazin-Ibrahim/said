<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Invoice\storeRequest;
use App\Interfaces\Invocie\InvocieRepositoryInterface;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected $inovceInterface;
    public function __constract(InvocieRepositoryInterface $inovceInterface)
    {
        $this->inovceInterface = $inovceInterface;
    }

    public function index()
    {
        $invoices = $this->inovceInterface->getAll();
        return response()->json($invoices,200);
    }

    public function show(Invoice $invoice)
    {
        return $this->inovceInterface->getInvoice($invoice);
    }

    public function store(storeRequest $request)
    {
        $invoice = $this->inovceInterface->create($request->only('user_id','customer_id','total','discount','total_after_discount','type_of_payment','invoce_items'));

        return response()->json($invoice,201);
    }
   
  
}
