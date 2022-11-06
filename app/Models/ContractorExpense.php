<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractorExpense extends Model
{
    use HasFactory;

    protected $fillable = [
        'contractor_id',
        'date',
        'amount_paid',
        'description',
    ];

    protected $casts = [
        'contractor_id' => 'integer',
    ];
}
