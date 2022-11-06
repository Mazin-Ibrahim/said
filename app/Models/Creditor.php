<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creditor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'debit_amount',
        'remaining',
        'description',
    ];

    

    public function creditorDetails()
    {
        return $this->hasMany(CreditorDetails::class);
    }
}
