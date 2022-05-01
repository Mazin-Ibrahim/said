<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Product\ProductReportsInterface;
use Illuminate\Http\Request;

class ProductReportController extends Controller
{
    protected $productReportInterface;

    public function __construct(ProductReportsInterface $productReportInterface)
    {
        $this->productReportInterface = $productReportInterface;
    }

    public function getProductsCount()
    {
        $productsCount = $this->productReportInterface->getProductsCount();
        return response()->json(['products Count' => $productsCount], 200);
    }

    public function getProductsQuantity()
    {
      
          $productsQuantity =  $this->productReportInterface->getProductsQuantity();
        return response()->json(['productsQuantity' => $productsQuantity], 200);
    }

    public function getProductsProfit()
    {
        $profit = $this->productReportInterface->getProfitFromProducts();
        return response()->json(['Profit' => $profit], 200);
    }
  
}
