<?php

namespace App\Services\Admin;

class OrderService
{
    public function showManageOrder(){
        return view('admins.orders.manage-order', [
            'title_head' => 'Manage Order'
        ]);
    }
}