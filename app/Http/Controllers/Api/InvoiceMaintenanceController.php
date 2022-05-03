<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Invoice\storeInvoiceMaintenance;
use App\Interfaces\Invoice\InvoiceMaintenanceInterface;
use Illuminate\Http\Request;

class InvoiceMaintenanceController extends Controller
{
    protected $invoiceMaintenanceInterface;

    public function __construct(InvoiceMaintenanceInterface $invoiceMaintenanceInterface)
    {
        $this->invoiceMaintenanceInterface = $invoiceMaintenanceInterface;
    }

    public function createInvoiceMaintenance(storeInvoiceMaintenance $request)
    {
        
        return $this->invoiceMaintenanceInterface->createInvoiceMaintenance($request->only([
            'customer_id', 'total', 'discount', 'total_after_discount', 'type_of_payment', 'invoce_items', 'maintenance_id'
        ]));
    }
}
