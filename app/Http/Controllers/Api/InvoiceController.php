<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Invoice\storeRequest;
use App\Http\Requests\Api\Invoice\updateRequest;
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

    public function index(Request $request)
    {
        $invoices = $this->invocieInterface->getAll($request);
        return response()->json($invoices, 200);
    }

    public function getInvoice(Invoice $invoice)
    {

        return $this->invocieInterface->getInvoice($invoice);
    }

    public function store(storeRequest $request)
    {

        $invoice = $this->invocieInterface->create($request->only(
            ['customer_id', 'total', 'discount', 'total_after_discount', 'type_of_payment', 'invoce_items', 'additional_invoice_information']
        ));


        return response()->json($invoice, 201);
    }

    public function update(updateRequest $request, Invoice $invoice)
    {

        $invoice = $this->invocieInterface->update($request->only(
            ['customer_id', 'total', 'discount', 'total_after_discount', 'type_of_payment', 'invoce_items']
        ), $invoice);

        return $invoice;
    }
}
