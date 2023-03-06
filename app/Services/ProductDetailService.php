<?php

namespace App\Services;

class ProductDetailService
{
    public function showProductDetail()
    {
        $title = 'Product detail';
        $product = [
            'name' => 'Áo hoodie R Star unisex ullzang nỉ ngoại local brand MOUTEE - Áo khoác nỉ trơn unisex 7 màu có form rộng XL - MOUTEE.SG',
            'image' => 'https://cf.shopee.vn/file/vn-11134201-23020-hqepqqxwbpnv30',
            'price' => '169.000',
            'old_price' => '460.000',
            'images' => [
                'https://cf.shopee.vn/file/vn-11134201-23020-hqepqqxwbpnv30',
                'https://cf.shopee.vn/file/vn-11134201-23020-650tenxwbpnvb4',
                'https://cf.shopee.vn/file/vn-11134201-23020-6kinf4wwbpnv81',
                'https://cf.shopee.vn/file/vn-11134201-23020-zapmz4wwbpnvf7',
                'https://cf.shopee.vn/file/vn-11134201-23020-2dahawxwbpnv72'
            ],
            'sizes' => ['S', 'M', 'L', 'XL']
        ];

        return view('clients.product-detail', [
            'product' => $product,
            'title_head' => $title
        ]);
    }

    public function chooseProduct($request) {
        $data = $request->all();

        $products = [
            'purple' => [
                'price' => 111,
                'order' => 100,
                'revenue' => 12345,
                'images' => [
                    'assets/images/products/img-8.png'
                ],
                'size' => [
                    's' => [
                        'price' => 111,
                        'stock' => 4,
                    ],
                    'm' => [
                        'price' => 115,
                        'stock' => 3,
                    ],
                    'l' => [
                        'price' => 116,
                        'stock' => 7,
                    ],
                ]
            ],
            'blue' => [
                'price' => 144,
                'order' => 120,
                'revenue' => 13545,
                'images' => [
                    'assets/images/products/img-6.png'
                ],
                'size' => [
                    's' => [
                        'price' => 144,
                        'stock' => 4,
                    ],
                    'm' => [
                        'price' => 147,
                        'stock' => 4,
                    ],
                    'l' => [
                        'price' => 149,
                        'stock' => 4,
                    ],
                ]
            ],
            'green' => [
                'price' => 124,
                'order' => 150,
                'revenue' => 15545,
                'images' => [
                    'assets/images/products/img-1.png'
                ],
                'size' => [
                    's' => [
                        'price' => 124,
                        'stock' => 3,
                    ],
                    'm' => [
                        'price' => 126,
                        'stock' => 4,
                    ],
                    'l' => [
                        'price' => 127,
                        'stock' => 2,
                    ],
                ]
            ],
        ];
        
        $color = strtolower($data['color']);
        $size = strtolower($data['size']);

        $product_color = array_merge([
            'price' => 0,
			'order' => 0,
			'revenue' => 0,
			'images' => 0,
			'stock' => 0
        ], $products[$color] ?? []);

        $product_size = !empty($products[$color]['size'][$size]) ? $products[$color]['size'][$size] : [];

        $response = array_merge($product_color, $product_size);
        unset($response['size']);

        return $response;
    }
}
