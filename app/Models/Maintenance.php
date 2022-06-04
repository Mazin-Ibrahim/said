<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'worker_id',
        'customer_id',
        'customer_name',
        'location_name',
        'location_id',
        'address',
        'description',
        'contract_price'
    ];

    public function maintenancesPaymentDetails()
    {
        return $this->hasMany(MaintenancesPaymentDetails::class, 'maintenance_id');
    }

    public function HistoryVisitsMaintenance()
    {
        return $this->hasMany(HistoryVisitsMaintenance::class, 'maintenance_id');
    }
}
