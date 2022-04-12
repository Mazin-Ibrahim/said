<?php

namespace Tests\Unit\Product;

use App\Models\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    public function testSetProfit()
    {
        $this->withoutExceptionHandling();
        $product = Product::factory()->create();
        $product->setProfit();
        $productProfit = $product->sell_price - $product->buy_price;
     
      
        $this->assertEquals($productProfit, $product->getProfit());
    }
}
