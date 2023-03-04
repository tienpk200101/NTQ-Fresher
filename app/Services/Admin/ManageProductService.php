<?php

namespace App\Services\Admin;

class ManageProductService
{
    public function showManageProduct() {
        return view('admins.products.index', [
            'title_head' => 'Manage Product'
        ]);
    }

    public function showAddProduct() {
        return view('admins.products.add', [
            'title_head' => 'Add Product'
        ]);
    }
}