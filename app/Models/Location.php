<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'address', 'contract_price', 'description', 'received_date', 'delivery_date', 'location_name', 'customer_name'];


    protected $casts = [
        'customer_id' => 'integer',
        'customer_id' => 'integer'

    ];
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['qty', 'status', 'note']);
    }

    public function paymentDetails()
    {
        return $this->hasMany(PaymentDetails::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function locationExpenses()
    {
        return $this->hasMany(LocationExpense::class);
    }
}
