<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenancesPaymentDetails extends Model
{
    use HasFactory;
    protected $fillable = ['maintenance_id', 'status', 'amount', 'date', 'description', 'worker_id', 'worker_name'];
}
