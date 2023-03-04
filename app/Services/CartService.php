<?php

namespace App\Services;

class CartService
{
    public function showCart() {
        $title_page = 'Cart';

        return view('clients.cart', [
            'title_head' => $title_page
        ]);
    }
}
