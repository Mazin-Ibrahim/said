<?php 


namespace App\Repositories\Location;

use App\Interfaces\Location\LocationRepositoryInterface;
use App\Models\Location;

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
      
        $location = Location::create([
            'customer_id' => $data['customer_id'],
            'address' => $data['address'],
            'description' => $data['description'],
            'contract_price' => $data['contract_price'],
            'received_date' => $data['received_date'],
            'delivery_date' => $data['delivery_date'],
        ]);
        

        
        $location->products()->sync($data['products']);

        collect($data['payment_details'])->each(function($payment) use($location){
            $location->paymentDetails()->create([
                'amount' => $payment['amount'],
                'payment_received_date' => $payment['payment_received_date'],
            ]);
        });

        return $location->load('products','paymentDetails');
    }

    public function update($data, $location)
    {
        # code...
    }

    public function delete($location)
    {
        # code...
    }
}