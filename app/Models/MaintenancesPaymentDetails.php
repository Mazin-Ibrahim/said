<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenancesPaymentDetails extends Model
{
    use HasFactory;
    protected $fillable = ['maintenance_id', 'status', 'amount', 'date', 'description', 'reciver_name', 'recipient_name'];


    public function maintenance()
    {
        return $this->belongsTo(Maintenance::class);
    }
}
