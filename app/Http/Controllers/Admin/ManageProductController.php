<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\Admin\ManageProductService;
use Illuminate\Http\Request;

class ManageProductController extends Controller
{
    /**
     * @var ManageProductService
     */
    protected $manageProductService;

    /**
     * @param ManageProductService $manageProductService
     */
    public function __construct(ManageProductService $manageProductService)
    {
        $this->manageProductService = $manageProductService;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function showManageProduct() {
        return $this->manageProductService->showManageProduct();
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function showAddProduct() {
        return $this->manageProductService->showAddProduct();
    }

    /**
     * @param ProductRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleAddProduct(ProductRequest $request) {
        return $this->manageProductService->handleAddProduct($request);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showEditProduct(Request $request, $id) {
        return $this->manageProductService->showEditProduct($request, $id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleEditProduct(Request $request, $id) {
        return $this->manageProductService->handleEditProduct($request, $id);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showViewProduct($id) {
        return $this->manageProductService->showViewProduct($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProduct($id) {
        return $this->manageProductService->deleteProduct($id);
    }
}
