<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Invoice\InvocieReportsInterface;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\Specificity;

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

    public function getSalesByPeriodDate(Request $request)
    {
        $sales = $this->ivoiceReportInterface->getSalesByPeriodDate($request->startDate, $request->endDate);
        return response()->json($sales, 200);
    }

    public function getSalesBySpecificCustomer(Request $request)
    {
        
        $sales = $this->ivoiceReportInterface->getSalesBySpecificCustomer($request->customer_id);

        return response()->json($sales, 200);
    }

    public function getProductSalesByPeroidDate(Request $request)
    {
        $productSales = $this->ivoiceReportInterface->getProductSalesByPeroidDate($request->startDate, $request->endDate,$request->product_id);
        return response()->json($productSales, 200);
    }
  
}
