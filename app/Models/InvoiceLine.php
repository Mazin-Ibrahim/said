<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'product_id',
        'qty',
    ];

    protected $casts = [
        'invoice_id' => 'integer',
        'product_id' => 'integer',
    ];
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

     public function product()
     {
         return $this->belongsTo(Product::class);
     }
}
