<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'customer_id',
        'total',
        'discount',
        'total_after_discount',
        'type_of_payment',
    ];

    public function invoiceLines()
    {
        return $this->hasMany(InvoiceLine::class);
    }
}
