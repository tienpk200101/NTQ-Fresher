<?php

namespace App\Services;

class CartService
{
    public function showCart() {
        $title_page = 'Cart';

        return view('admins.cart', [
            'title_head' => $title_page
        ]);
    }
}
