<?php

namespace App\Http\Controllers;

use App\Services\ProductDetailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductDetailController extends Controller
{
    protected $productDetailService;

    public function __construct(ProductDetailService $productDetailService)
    {
        $this->productDetailService = $productDetailService;
    }

    public function showProductDetail($id) {
        return $this->productDetailService->showProductDetail($id);
    }

    public function getProductVariable() {
        return $this->productDetailService->getProductVariables();
    }

    public function chooseProduct(Request $request) {
        return $this->productDetailService->chooseProduct($request);
    }
}
