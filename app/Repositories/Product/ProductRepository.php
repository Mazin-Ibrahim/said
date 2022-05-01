<?php


namespace App\Repositories\Product;

use App\Interfaces\Product\ProductReportsInterface;
use App\Models\Product;
use App\Interfaces\Product\ProductRepositoryInterface;
use App\Models\Image;

class ProductRepository implements ProductRepositoryInterface, ProductReportsInterface
{
    public function getAll()
    {
        return Product::with('images')->simplePaginate(10);
    }

    public function getProduct($product)
    {
        return $product->load('images');
    }

    public function create($data)
    {
       $product = Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'buy_price' => $data['buy_price'],
            'sell_price' => $data['sell_price'],
            'category_id' => $data['category_id'],
            'qty' => $data['qty'],
        ]);

     
        $imagesPath = [];
        foreach ($data['images'] as $image) {
            $extension = $image->getClientOriginalExtension();
            array_push($imagesPath, $image->move('images', time().'-'.rand(10, 10000).'.'.$extension));
        }


     collect($imagesPath)->each(function ($image) use ($product) {
            Image::create([
                'path' => $image->getFilename(),
                'imageable_id' => $product->id,
                'imageable_type' => get_class($product),
            ]);
        });

        return $product;

       
    }

    public function update($product, $data)
    {
        $product->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'buy_price' => $data['buy_price'],
            'sell_price' => $data['sell_price'],
            'category_id' => $data['category_id'],
            'qty' => $data['qty'],
        ]);

        $imagesPath = [];
        foreach ($data['images'] as $image) {
            $extension = $image->getClientOriginalExtension();
            array_push($imagesPath, $image->move('images', time().'-'.rand(10, 10000).'.'.$extension));
        }

        collect($imagesPath)->each(function ($image) use ($product) {
            $product->images()->update([
                'path' => $image->getFilename(),
                'imageable_type' => get_class($product),
            ]);
        });


        return $product;
    }

    public function delete($product)
    {
        return   $product->delete();
    }

    public function getProductsCount()
    {
        return Product::count();
    }

    public function getProductsQuantity()
    {
        
        return Product::sum('qty');
    }

    public function getProfitFromProducts()
    {
      
        $products = Product::all();
        $profit = 0;
        foreach ($products as $product) {
            $profit += $product->qty * $product->profit;
        }

        return $profit;
    }
}
