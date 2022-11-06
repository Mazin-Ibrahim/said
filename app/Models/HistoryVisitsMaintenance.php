<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryVisitsMaintenance extends Model
{
    use HasFactory;
    protected $fillable = ['maintenance_id', 'status', 'amount', 'date', 'description', 'worker_id', 'worker_name'];

    protected $casts = [
        'maintenance_id' => 'integer',
        'worker_id' => 'integer',
    ];

    public function maintenance()
    {
        return $this->belongsTo(Maintenance::class);
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
