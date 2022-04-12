<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'buy_price',
        'sell_price',
        'category_id',
        'qty',
    ];

    public function setProfit()
    {
        return $this->update([
            'profit' => $this->sell_price - $this->buy_price,
        ]);
    }

    public function getProfit()
    {
        return $this->profit;
    }
}
