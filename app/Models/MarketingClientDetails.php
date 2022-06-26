<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingClientDetails extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'payment_amount', 'description'];
}
