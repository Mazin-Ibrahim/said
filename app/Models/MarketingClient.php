<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingClient extends Model
{
    use HasFactory;

    protected $fillable = ['cutomer_name', 'location_id', 'location_name', 'amount', 'description'];
    
    protected $casts = [
        'location_id' => 'integer'
    ];

    public function marketingClientDetails()
    {
        return $this->hasMany(MarketingClientDetails::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
