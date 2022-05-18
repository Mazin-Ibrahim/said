<?php

namespace App\Repositories\Invoice;

use App\Interfaces\Invoice\InvocieReportsInterface;
use App\Interfaces\Invoice\InvocieRepositoryInterface;
use App\Interfaces\Invoice\InvoiceMaintenanceInterface;
use App\Interfaces\Invoice\InvoiceReportsInterface;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceLine;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class InvoiceRepository implements InvocieRepositoryInterface, InvocieReportsInterface,InvoiceMaintenanceInterface
{
    
    public function getAll($request)
    {
        if($request->display_count){

            return Invoice::take($request->dispaly_count)->with('invoiceLines.product')->get();
        }
        return Invoice::with('invoiceLines.product','customer')->get();

    } 
    public function getInvoice($invoce)
    {
        return $invoce->load('invoiceLines');
    }

    public function create($data)
    {
       
        DB::beginTransaction();
        try {
            $invoice = new Invoice();
            $invoice->user_id = auth()->user()->id;
            $invoice->customer_id = $data['customer_id'];
            $invoice->total = $data['total'];
            $invoice->discount = $data['discount'];
            $invoice->total_after_discount = $data['total_after_discount'];
            $invoice->type_of_payment = $data['type_of_payment'];
            $invoice->save();
            
            collect($data['invoce_items'])->each(function($item){
                $product = Product::find($item['product_id']);
                $product->qty = $product->qty - $item['qty'];

                $product->save();
            });
            collect($data['invoce_items'])->each(function($item) use ($invoice){
                $invoice->invoiceLines()->create([
                    'product_id' => $item['product_id'],
                    'qty' => $item['qty']
                ]);
            });
            DB::commit();
            return $invoice->load('invoiceLines.product');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    // public function update($data, $invoice)
    // {
    
    // }

    public function delete($invoce)
    {
      return $invoce->delete();
    }

    public function getInvoicesBayDay($date)
    {
        return Invoice::whereDate('created_at', $date)->with('invoiceLines.product')->get();
    }



    public function createInvoiceMaintenance($data)
    {
        DB::beginTransaction();
        try {
            $invoice = new Invoice();
            $invoice->user_id = auth()->user()->id;
            $invoice->customer_id = $data['customer_id'];
            $invoice->total = $data['total'];
            $invoice->discount = $data['discount'];
            $invoice->total_after_discount = $data['total_after_discount'];
            $invoice->type_of_payment = $data['type_of_payment'];
            $invoice->maintenance_id = $data['maintenance_id'];
            $invoice->save();
            
            collect($data['invoce_items'])->each(function($item){
                $product = Product::find($item['product_id']);
                $product->qty = $product->qty - $item['qty'];

                $product->save();
            });
            collect($data['invoce_items'])->each(function($item) use ($invoice){
                $invoice->invoiceLines()->create([
                    'product_id' => $item['product_id'],
                    'qty' => $item['qty']
                ]);
            });
            DB::commit();
            return $invoice->load('invoiceLines.product');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }



    public function getSalesByPeriodDate($startDate, $endDate)
    {
        $startDate = Carbon::parse($startDate)->toDateTimeString();
        $endDate = Carbon::parse($endDate)->toDateTimeString();
        $sales = Invoice::whereBetween('created_at', [$startDate, $endDate])->get();

        return $sales;
    }

    public function getSalesBySpecificCustomer($customer_id)
    {
        $customer = Customer::find($customer_id);

        return $customer->load('invoices.invoiceLines');
    }

    public function getProductSalesByPeroidDate($startDate, $endDate,$product_id)
    {
        $startDate = Carbon::parse($startDate)->toDateTimeString();
        $endDate = Carbon::parse($endDate)->toDateTimeString();

        $productSales = InvoiceLine::whereBetween('created_at',[$startDate,$endDate])->where('product_id',$product_id)->sum('qty');
        return $productSales;
    }
   


}