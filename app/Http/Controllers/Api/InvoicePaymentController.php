<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoicePaymentController extends Controller
{
    public function store(Request $request, Invoice $invoice)
    {
        $request->validate([
            'description' => 'required',
            'receiver_name' => 'required',
            'date' => 'required|date',
            'amount' => 'required'
        ]);


        $invoice->invoicePayment()->create([
            'description' => $request->get('description'),
            'receiver_name' => $request->get('receiver_name'),
            'date' => $request->get('date'),
            'amount' => $request->get('amount'),
        ]);

        return response()->json($invoice->load('invoicePayment'), 201);
    }
}
