<?php

namespace App\Services;

use App\Models\ProductModel;
use App\Models\ProductVariableModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ProductDetailService
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showProductDetail($id)
    {
        $product = ProductModel::find($id);
        $images = [];
        $colors = [];
        $sizes = [];

        // Lấy ra tất cả các biến thể của sản phẩm.
        $product_variables = ProductVariableModel::where('product_id', $id)->get();

        if(count($product_variables) == 0) {
            $images[] = $product->images;
        }

        foreach ($product_variables as $product_variable) {
            // 1 biến thể sản phẩm lấy ra các attr_variable.
            $attr_variables = $product_variable->getAttributeVariable;

            foreach ($attr_variables as $attr_variable) {
                // lấy ra các attribute của 1 attr_variable.
                $attribute = $attr_variable->getAttributeModel;

                // Lấy ra term từ attribute để biết nó là của thuộc tính nào (size hay color).
                $term = $attribute->getTermAttribute;
                $product_variable[$term->slug] = $attribute->slug;
            }

            $images[] = $product_variable->image;
            $colors[] = $product_variable->color;
            $sizes[] = $product_variable->size;
        }
        Cache::put('products', $product_variables, 30 * 60);

        return view('client.product-detail', [
            'product' => $product,
            'images' => $images,
            'colors' => array_unique($colors),
            'sizes' => array_unique($sizes),
            'title_head' => 'Product detail'
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * Lấy ra tất cả các thuộc tính và truyền qua json cho bên javascript xử lý.
     */
    public function getProductVariables() {
        if(Cache::has('products')) {
            return response()->json(['data' => Cache::get('products')]);
        }

        return response()->json(['data' => '']);
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function chooseProduct($request) {
        $data_chooses = $request->all();
        $products = Cache::get('products');

        $color = strtolower(empty($data_chooses['color']) ? $products[0]->color : $data_chooses['color']);
        $size = strtolower(empty($data_chooses['size']) ? $products[0]->size : $data_chooses['size']);

        $product_default = [
            'id' => 0,
            'product_id' => 0,
            'stock' => 0,
            'image' => '',
            'description' => '',
            'discount' => 0,
            'regular_price' => 0,
            'sale_price' => 0,
            'color' => '',
            'size' => ''
        ];

        foreach ($products as $product) {
            if($product->size == $size && $product->color == $color) {
                return response()->json(['product' => $product, 'color' => $color, 'size' => $size]);
            }
        }

        return response()->json(['product' => $product_default, 'color' => $color, 'size' => $size]);
    }
}
