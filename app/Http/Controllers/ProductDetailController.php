<?php

namespace App\Http\Controllers;

use App\Services\ProductDetailService;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    protected $productDetailService;

    public function __construct(ProductDetailService $productDetailService)
    {
        $this->productDetailService = $productDetailService;
    }

    public function showProductDetail() {
        return $this->productDetailService->showProductDetail();
    }

    public function chooseProduct(Request $request) {
        return $this->productDetailService->chooseProduct($request);
    }
}
