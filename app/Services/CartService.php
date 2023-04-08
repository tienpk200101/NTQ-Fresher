<?php

namespace App\Services;

class CartService
{
    public function showCart() {
        $total = 0;

        if(session()->has('cart')) {
            $carts = session()->get('cart');
            foreach ($carts as $product_id => $cart) {
                $total += (int)$cart['price'] * (int)$cart['quantity'];
            }

            $carts['shipping_charge'] = 65.00;
            $carts['estimate_tax'] = ($total * 12.5) / 100;
            $carts['sub_total'] = $total;
            $carts['total'] = $total + $carts['estimate_tax'] + $carts['shipping_charge'];

            return $carts;
        }

        return [];
    }
}
