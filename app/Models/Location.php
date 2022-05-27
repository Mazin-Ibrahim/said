<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','address','contract_price','description','received_date','delivery_date'];


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function paymentDetails()
    {
        return $this->hasMany(PaymentDetails::class);
    }
}
