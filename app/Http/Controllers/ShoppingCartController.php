<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function addToCart($id): \Illuminate\Http\JsonResponse
    {
        $product = ProductModel::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->title,
                'quantity' => 1,
                'price' => $product->sale_price,
                'image' => $product->images
            ];
        }

        session()->put('cart', $cart);
        return response()->json(['data' => $cart, 'message' => 'Add to cart success!']);
//        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function update(Request $request) {
        if($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart update successfully');
        }
    }

    public function removeProductFromCart(Request $request) {
//        return response()->json(['data' => $request->id]);
//        $this->middleware = ['guard:customer'];

        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            return response()->json(['data' => $cart, 'id' => $request->id, 'message' => 'Product removed successfully']);
//            session()->flash('success', 'Product removed successfully');
        }
    }

}
