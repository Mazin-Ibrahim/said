<?php  

namespace App\Interfaces\Product;

Interface ProductReportsInterface
{
    public function getProductsCount();
    public function getProductsQuantity();
    public function getProfitFromProducts();
    
}