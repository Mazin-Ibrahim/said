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
        'danger_amount',
        'selling_method_id'
    ];

    protected $casts = [
        'category_id' => 'integer',
        'selling_method_id' => 'integer',
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

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function invoiceLines()
    {
        return $this->hasMany(InvoiceLine::class);
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }

    public function sellingMethod()
    {
        return $this->belongsTo(SellingMethod::class);
    }
}
