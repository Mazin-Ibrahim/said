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

    protected $casts = [
        'department_id' => 'integer'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function debts()
    {
        return $this->hasMany(Debt::class);
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
}
