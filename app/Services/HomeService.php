<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductVariable;
use App\Repositories\Admin\ProductRepository;
use Illuminate\Support\Facades\DB;

class HomeService
{
    private $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function showHome() {
        $products = $this->productRepository->getAllProduct();

        return $products;
    }
}
