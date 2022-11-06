<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditorDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'creditor_id',
        'date',
        'amount_paid',
        'description',
    ];

    protected $casts = [
        'creditor_id' => 'integer',
    ];
}
