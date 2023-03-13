<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
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

    public function handleAddProduct(ProductRequest $request) {
        return $this->manageProductService->handleAddProduct($request);
    }

    public function showEditProduct(Request $request, $id) {
        return $this->manageProductService->showEditProduct($request, $id);
    }

    public function handleEditProduct(Request $request, $id) {
        return $this->manageProductService->handleEditProduct($request, $id);
    }

    public function showViewProduct($id) {
        return $this->manageProductService->showViewProduct($id);
    }

    public function deleteProduct($id) {
        return $this->manageProductService->deleteProduct($id);
    }
}
