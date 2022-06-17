<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location_name',
        'location_id',
        'work_starting_date',
        'agreement_amount',
        'description',
    ];

    public function expenses()
    {
        return $this->hasMany(ContractorExpense::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
