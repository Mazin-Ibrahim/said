<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = ['value', 'description', 'date'];

    protected $casts = [
        'date' => 'datetime:Y-m-d H:00',
    ];
}
