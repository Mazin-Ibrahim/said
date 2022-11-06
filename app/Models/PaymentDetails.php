<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
    use HasFactory;

    protected $fillable = ['location_id', 'amount', 'payment_received_date', 'status', 'receiver_name'];
      
    protected $casts = [
        'location_id' => 'integer'
    ];
    
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
