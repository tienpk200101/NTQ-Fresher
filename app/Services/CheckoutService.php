<?php

namespace App\Services;

class CheckoutService
{
    public function showCheckout() {
        $title_page = 'Checkout';

        return view('clients.checkout', [
            'title_head' => $title_page
        ]);
    }
}
