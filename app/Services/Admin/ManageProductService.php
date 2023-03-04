<?php

namespace App\Services\Admin;

class ManageProductService
{
    public function showManageProduct() {
        return view('admins.products.index', [
            'title_head' => 'Manage Product'
        ]);
    }
}