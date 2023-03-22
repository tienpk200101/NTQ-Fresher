<?php

namespace App\Services;

use App\Models\ProductModel;
use App\Models\ProductVariableModel;
use Illuminate\Support\Facades\DB;

class HomeService
{
    public function showHome() {
        $title = 'Home';
        $products = ProductModel::all();

        return view('client.list-product', [
            'products' => $products,
            'title_head' => $title
        ]);
    }
}
