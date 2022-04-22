<?php

namespace App\Repositories\Invoice;

use App\Interfaces\Invoice\InvocieRepositoryInterface;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class InvoiceRepository implements InvocieRepositoryInterface
{
    
    public function getAll()
    {
        return Invoice::paginate(10);
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
            $invoice->user_id = $data['user_id'];
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
            return $invoice;
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
   


}