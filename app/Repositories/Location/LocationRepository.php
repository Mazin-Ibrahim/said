<?php 


namespace App\Repositories\Location;

use App\Interfaces\Location\LocationRepositoryInterface;
use App\Models\Location;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class LocationRepository implements LocationRepositoryInterface {

    public function getAll()
    {
       return Location::with('products','paymentDetails')->get();
    }

    public function getLocation($location)
    {
        return $location->load('products','paymentDetails');
    }

    public function create($data)
    {
        DB::beginTransaction();
        try{
            collect($data['products'])->each(function($item){
                if($item['status'] =='delivered'){
                    $product = Product::find($item['id']);
                    $data['productsQty1'] = $product->qty;
                    $data['ItemQty'] = $item['qty'];
                    $product->qty = $product->qty - $item['qty'];
                    $product->save();
                    $data['productsQty2'] = $product->qty;
                 
                }
              
            });
            $productLocationData= collect($data['products'])->groupBy('id')->toArray();
            $productLocationDataCollection = new Collection($productLocationData);
    
            $products =$productLocationDataCollection->map(function($item,$key){
                return collect($item)->map(function($item){
                    return [
    
                        'qty' => $item['qty'],
                        'status' => $item['status']
                    ];
                })->collapse();
            })->toArray();

            $location = Location::create([
                'customer_id' => $data['customer_id'],
                'address' => $data['address'],
                'description' => $data['description'],
                'contract_price' => $data['contract_price'],
                'received_date' => $data['received_date'],
                'delivery_date' => $data['delivery_date'],
                'location_name' => $data['location_name']
            ]);
            $location->products()->sync($products);
      

        collect($data['payment_details'])->each(function($payment) use($location){
            $location->paymentDetails()->create([
                'amount' => $payment['amount'],
                'payment_received_date' => $payment['payment_received_date'],
            ]);
        });
        
        DB::commit();
        return $location->load('products','paymentDetails');
            
        }catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    
       
      

    
        
    }

    public function update($data, $location)
    {
        # code...
    } 

    public function delete($location)
    {
        # code...
    }


    public function getPaymentDetails($location)
    {
        return $location->load('paymentDetails');
    }

    public function collectionLocationPayment($location,$request)
    {
        $location->paymentDetails()->find($request->payment_id)->update([
          'status' => $request->status,
        ]);

        return $location->load('paymentDetails');
    }
   
}