<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\storeRequest;
use App\Http\Requests\Api\Product\updateRequest;
use App\Interfaces\Product\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productInterface;

    public function __construct(ProductRepositoryInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }

    public function index(Request $request)
    {
        $products = $this->productInterface->getAll($request);
        return inertia('Dashboard/Product/index',[
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        // dd($categories);
        return inertia('Dashboard/Product/create',[
            'categories' => $categories
        
        ]);
    }

    public function store(storeRequest $request)
    {
        
        $this->productInterface->create($request->only(['name','category_id','buy_price','sell_price','qty','profit','description','images']));
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return inertia('Dashboard/Product/edit',[
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(updateRequest $request, Product $product)
    {
        $this->productInterface->update($product, $request->only(['name','category_id','buy_price','sell_price','qty','profit','description','images']));
        return redirect()->route('products.index');
    }

    public function delete(Product $product)
    { 
        $product->images()->delete();
        $product->delete();
        return redirect()->route('products.index');

    }
 
}
