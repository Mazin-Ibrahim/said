<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalInvoiceInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'service_name',
        'service_price',
        'description',
    ];

    protected $casts = [
        'invoice_id' => 'integer',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
