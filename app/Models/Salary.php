<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'worker_id',
        'salary',
        'date',
        'type',
        'worker_name',
        'description'
    ];

    protected $casts = [
        'worker_id' => 'integer'
    ];

    public function worker()
    {
        return $this->belongsTo(Worker::class, 'worker_id');
    }
}
