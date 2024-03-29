<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    protected $fillable = ['worker_id','value','date','description'];


    protected $casts = [
        'worker_id' => 'integer',
    ];
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
