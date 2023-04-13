<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;
use function Ramsey\Collection\add;

class CheckoutService
{
    public function order($data)
    {
        $info = [];
        $result = true;

        if(session()->has('cart')) {
            $products = session()->get('cart');
            $subTotal = 0;

            foreach ($products as $product) {
                $subTotal += (int)$product['quantity'] * $product['price'];
            }

            $info['sub_total'] = $subTotal;
            $info['shipping'] = 10;
            $info['tax'] = ($subTotal * 12.5) / 100;
            $info['total'] = $subTotal + ($subTotal * 12.5) / 100 + 10;
        } else {
            return redirect()->route('home');
        }

        $now = Carbon::now();
        $data_order = [
            'customer_id' => Auth::id(),
            'address' => $data['address'] ?? $data['address2'],
            'tracking_id' => Str::random(24),
            'sub_total' => $info['sub_total'],
            'total' => $info['total'],
            'payment_method' => (int)$data['payment'],
            'tax' => $info['tax'],
            'delivery_date' => $now->add(5, 'day'),
            'status' => 1
        ];

        try {
            $order_id = Order::updateOrCreate($data_order)->id;
        } catch (\Exception $exception) {
//            dd($exception->getMessage());
            $result = false;
        }

        foreach (session()->get('cart') as $key => $product) {
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order_id;
            $order_detail->customer_id = Auth::id();
            $order_detail->product_id = (int)$key;
            $order_detail->quantity = (int)$product['quantity'];
            $order_detail->sub_total = (int)$product['quantity'] * (int)$product['price'];
            $order_detail->discount = $product['discount'] ?? 0;
            $order_detail->estimate_tax = ($order_detail->sub_total * 12) / 100;
            $order_detail->shipping_charge = 10;
            $order_detail->total = $order_detail->sub_total + $order_detail->estimate_tax + $order_detail->shipping_charge - $order_detail->discount;

            try {
                $order_detail->save();
            } catch (\Exception $exception) {
//                dd($exception->getMessage());
                $result = false;
            }
        }

        return $result;
    }
}
