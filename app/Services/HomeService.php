<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductVariable;
use Illuminate\Support\Facades\DB;

class HomeService
{
    public function showHome() {
        $title = 'Home';
        $products = Product::all();

        return view('client.list-product', [
            'products' => $products,
            'title_head' => $title
        ]);
    }
}
