<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator;

class CheckoutService
{
    public function showCheckout()
    {
        $title_page = 'Checkout';

        return view('clients.checkout', [
            'title_head' => $title_page
        ]);
    }

    public function validateCheckout($request)
    {
        if ($request->ajax()) {
            $validated = $request->validated();

            // if ($validated->fails()) {
            //     return response()->json(['error' => $validated->errors()->all(), 'status' => 0]);
            // }

            return response()->json(['success' => 'Added new records.', 'status' => 1]);
        }
    }
}
