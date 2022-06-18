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

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public static function calculateTotalAfterDiscount($total, $discount)
    {
        return $total - $discount;
    }

    public function additionalInvoiceInformation()
    {
        return $this->hasMany(AdditionalInvoiceInformation::class);
    }
}
