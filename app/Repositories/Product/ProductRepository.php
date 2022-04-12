<?php


namespace App\Repositories\Product;

use App\Models\Product;
use App\Interfaces\Product\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll()
    {
        return Product::paginate(10);
    }

    public function getProduct($product)
    {
        return $product;
    }

    public function create($data)
    {
        return Product::create($data);
    }

    public function update($product, $data)
    {
        $product->update($data);
        return $product;
    }

    public function delete($product)
    {
        return   $product->delete();
    }
}
