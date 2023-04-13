<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Services\CheckoutService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $checkoutService;

    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }

    public function index() {
        $title_page = 'Checkout';

        return view('client_2.checkout', [
            'title_head' => $title_page
        ]);
    }

    public function storeOrder(CheckoutRequest $request) {
        $data = $request->all();

        try {
            $this->checkoutService->order($data);
        } catch (\Exception $exception) {
            return back()->with('error',  $exception->getMessage());
        }

        session()->forget('cart');

//        dd(session()->get('cart'));
        return back()->with('success', 'Đặt đơn hàng thành công');
    }
}
