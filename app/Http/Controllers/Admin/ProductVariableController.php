<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ProductVariableService;
use Illuminate\Http\Request;

class ProductVariableController extends Controller
{
    protected $product_variable_service;

    public function __construct(ProductVariableService $product_variable_service)
    {
        $this->product_variable_service = $product_variable_service;
    }

    public function listProductVariable($id) {
        return $this->product_variable_service->listProductVariable($id);
    }

    public function showAddProductVariable($id) {
        return $this->product_variable_service->showAddProductVariable($id);
    }

    public function handleAddProductVariable($id, Request $request) {
        return $this->product_variable_service->handleAddProductVariable($id, $request);
    }

    public function showEditProductVariable($id) {
        return $this->product_variable_service->showEditProductVariable($id);
    }

    public function handleEditProductVariable($id, Request $request) {
        return $this->product_variable_service->handleEditProductVariable($id, $request);
    }

    public function deleteProductVariable($id) {
        return $this->product_variable_service->deleteProductVariable($id);
    }
}
