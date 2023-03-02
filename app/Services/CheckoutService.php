<?php

namespace App\Services;

class CheckoutService
{
    public function showCheckout() {
        $title_page = 'Checkout';

        return view('admins.checkout', [
            'title_head' => $title_page
        ]);
    }
}
