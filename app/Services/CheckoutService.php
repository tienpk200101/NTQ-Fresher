<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator;

class CheckoutService
{
    public function showCheckout()
    {
        $title_page = 'Checkout';

        return view('client.checkout', [
            'title_head' => $title_page
        ]);
    }


    public function validateCheckout($request)
    {
        if ($request->ajax()) {
            try {
                return response()->json(['success' => 'Added new records.']);
            } catch (\Throwable $th) {
                return response()->json(['error' => $th->getMessage()], 204);
            }

            // if ($validated->fails()) {
            //     return response()->json(['error' => $validated->errors()->all()], 204);
            // }

            // return response()->json(['success' => 'Added new records.']);
        }
    }
}
