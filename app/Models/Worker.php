<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department_id',
        'salary',
        'phone',
        'description',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
