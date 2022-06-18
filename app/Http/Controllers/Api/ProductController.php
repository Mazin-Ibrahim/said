<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\storeRequest;
use App\Http\Requests\Api\Product\updateRequest;
use App\Interfaces\Product\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $products = $this->productRepository->getAll($request);

        return response()->json($products, 200);
    }

    public function getProduct(Product $product)
    {
        $product = $this->productRepository->getProduct($product);

        return response()->json($product, 200);
    }

    public function store(storeRequest $request)
    {

        $product = $this->productRepository->create($request->only(
            ['name', 'description', 'buy_price', 'sell_price', 'category_id', 'qty', 'images', 'danger_amount', 'selling_method_id']
        ));

        return response()->json($product, 201);
    }

    public function update(Product $product, updateRequest $request)
    {
        $product = $this->productRepository->update($product, $request->only(
            ['name', 'description',  'buy_price', 'sell_price', 'category_id', 'qty', 'danger_amount', 'selling_method_id']
        ));

        return response()->json($product, 200);
    }

    public function delete(Product $product)
    {
        $this->productRepository->delete($product);

        return response()->json(null, 204);
    }
}
