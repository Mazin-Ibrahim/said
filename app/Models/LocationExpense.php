<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationExpense extends Model
{
    use HasFactory;

    protected $fillable = ['location_id', 'description','date','value'];

    protected $casts = [
        'location_id' => 'integer'

    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
