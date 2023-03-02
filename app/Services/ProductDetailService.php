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

        return view('admins.product-detail', [
            'product' => $product,
            'title_head' => $title
        ]);
    }
}
