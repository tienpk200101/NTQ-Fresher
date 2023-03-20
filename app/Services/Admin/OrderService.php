<?php

namespace App\Services\Admin;

class OrderService
{
    public function showManageOrder(){
        return view('admin.orders.manage-order', [
            'title_head' => 'Manage Order'
        ]);
    }

    public function showOrderDetail() {
        return view('admin.orders.order-detail', [
            'title_head' => 'Order Detail'
        ]);
    }
}
