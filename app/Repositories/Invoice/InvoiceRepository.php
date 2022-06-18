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

class InvoiceRepository implements InvocieRepositoryInterface, InvocieReportsInterface, InvoiceMaintenanceInterface
{

    public function getAll($request)
    {
        if ($request->display_count) {

            return Invoice::take($request->dispaly_count)->with('invoiceLines.product')->get();
        }
        return Invoice::with('invoiceLines.product', 'customer', 'additionalInvoiceInformation')->get();
    }
    public function getInvoice($invoce)
    {
        return $invoce->load('invoiceLines.product', 'additionalInvoiceInformation');
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

            collect($data['invoce_items'])->each(function ($item) {
                $product = Product::find($item['product_id']);
                $product->qty = $product->qty - $item['qty'];

                $product->save();
            });
            collect($data['invoce_items'])->each(function ($item) use ($invoice) {
                $invoice->invoiceLines()->create([
                    'product_id' => $item['product_id'],
                    'qty' => $item['qty']
                ]);
            });

            collect($data['additional_invoice_information'])->each(function ($item) use ($invoice) {
                $invoice->additionalInvoiceInformation()->create([
                    'service_name' => $item['service_name'],
                    'service_price' => $item['service_price'],
                    'description' => $item['description']
                ]);
            });
            DB::commit();
            return $invoice->load('invoiceLines.product', 'additionalInvoiceInformation');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function update($data, $invoice)
    {
        // $dd = $invoice->invoiceLines()->where('product_id', 5)->first()->qty;
        // dd($dd);

        DB::beginTransaction();
        try {
            $invoice->customer_id = $data['customer_id'];
            $invoice->total = $data['total'];
            $invoice->discount = $data['discount'];
            $invoice->total_after_discount = $data['total_after_discount'];
            $invoice->type_of_payment = $data['type_of_payment'];
            $invoice->save();
            collect($data['invoce_items'])->each(function ($item) {
                if ($item['type'] == 'add') {
                    $product = Product::find($item['product_id']);
                    $product->qty = $product->qty - $item['qty'];
                    $product->save();
                } elseif ($item['type'] == 'sub') {
                    $product = Product::find($item['product_id']);
                    $product->qty = $product->qty + $item['qty'];
                    $product->save();
                }
            });



            collect($data['invoce_items'])->each(function ($item) use ($invoice) {
                if ($item['type'] == 'add') {
                    InvoiceLine::where('product_id', $item['product_id'])->where('invoice_id', $invoice->id)->update([
                        'product_id' => $item['product_id'],
                        'qty' => $invoice->invoiceLines()->where('product_id',  $item['product_id'])->first()->qty +  $item['qty']
                    ]);
                } elseif ($item['type'] == 'sub') {
                    InvoiceLine::where('product_id', $item['product_id'])->where('invoice_id', $invoice->id)->update([
                        'product_id' => $item['product_id'],
                        'qty' => $invoice->invoiceLines()->where('product_id',  $item['product_id'])->first()->qty -  $item['qty']
                    ]);
                }
            });



            DB::commit();
            return $invoice->load('invoiceLines.product');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

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

            collect($data['invoce_items'])->each(function ($item) {
                $product = Product::find($item['product_id']);
                $product->qty = $product->qty - $item['qty'];

                $product->save();
            });
            collect($data['invoce_items'])->each(function ($item) use ($invoice) {
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

    public function getProductSalesByPeroidDate($startDate, $endDate, $product_id)
    {
        $startDate = Carbon::parse($startDate)->toDateTimeString();
        $endDate = Carbon::parse($endDate)->toDateTimeString();

        $productSales = InvoiceLine::whereBetween('created_at', [$startDate, $endDate])->where('product_id', $product_id)->sum('qty');
        return $productSales;
    }


    public function getTotalSalesOnMonth()
    {
        // dd('asdasd');

        $months = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);
        $convertMonths = [
            1 => 'january',
            2 => 'february',
            3 => 'march',
            4 => 'april',
            5 => 'may',
            6 => 'june',
            7 => 'july',
            8 => 'august',
            9 => 'september',
            10 => 'october',
            11 => 'november',
            12 => 'december'
        ];



        $totalSales = $months->map(function ($month) use ($convertMonths) {

            return [

                // $convertMonths[$month] => Invoice::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',$month)->sum('total')

                'month' => $convertMonths[$month],
                'value' => (float) Invoice::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $month)->sum('total')

            ];
        });


        return $totalSales;
    }
}
