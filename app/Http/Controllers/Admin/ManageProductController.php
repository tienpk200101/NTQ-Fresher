<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ManageProductService;
use Illuminate\Http\Request;

class ManageProductController extends Controller
{
    protected $manageProductService;

    public function __construct(ManageProductService $manageProductService)
    {
        $this->manageProductService = $manageProductService;
    }

    public function showManageProduct() {
        return $this->manageProductService->showManageProduct();
    }

    public function showAddProduct() {
        return $this->manageProductService->showAddProduct();
    }
}
