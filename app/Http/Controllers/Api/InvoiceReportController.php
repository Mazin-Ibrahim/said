<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Invoice\InvocieReportsInterface;
use Illuminate\Http\Request;

class InvoiceReportController extends Controller
{
    protected $ivoiceReportInterface;

    public function __construct(InvocieReportsInterface $ivoiceReportInterface)
    {
        $this->ivoiceReportInterface = $ivoiceReportInterface;
    }

    public function getInvoicesByDay(Request $request)
    {
      
        $invoices = $this->ivoiceReportInterface->getInvoicesBayDay($request->date);

        return response()->json($invoices, 200);
    }
  
}
