<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index() {
        $carts = $this->cartService->showCart();

        return view('client_2.cart', [
            'title_head' => 'Shopping Cart',
            'cart' => $carts
        ]);
    }

    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function addToCart($id): \Illuminate\Http\JsonResponse
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'product_id' => $product->id,
                'name' => $product->title,
                'quantity' => 1,
                'price' => $product->sale_price,
                'image' => $product->images
            ];
        }

        session()->put('cart', $cart);
        return response()->json(['data' => $cart, 'message' => 'Add to cart success!']);
    }

    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart update successfully');
            return response()->json(['data' => 'update success']);
        }
    }

    public function removeProductFromCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            return response()->json(['data' => $cart, 'id' => $request->id, 'message' => 'Product removed successfully']);
        }
    }

    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function getTotalPrice() {
        if(session()->has('cart')) {
            $products = session()->get('cart');
            $sub_total = 0;
            foreach ($products as $key => $item) {
                $sub_total += $item['price'] * $item['quantity'];
            }

            return response()->json(['sub_total' =>  $sub_total, 'total_product' => count($products)]);
        }
    }
}
