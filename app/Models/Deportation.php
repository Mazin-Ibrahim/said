<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deportation extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'description',
        'product_name',
        'location_name',
        'value',
        'deported_name'
    ];

    protected $casts = [
        'location_id' => 'integer',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
