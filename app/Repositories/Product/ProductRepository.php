<?php


namespace App\Repositories\Product;

use App\Models\Product;
use App\Interfaces\Product\ProductRepositoryInterface;
use App\Models\Image;

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
}
