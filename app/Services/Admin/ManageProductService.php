<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Models\ProductModel;
use App\Models\ProductCategoryModel;
use App\Repositories\Admin\ProductRepository;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ManageProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function showManageProduct() {
        return view('admin.products.index', [
            'title_head' => 'Manage Product',
            'products' => ProductModel::all()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function showAddProduct() {
        return view('admin.products.add', [
            'title_head' => 'Add Product',
            'categories' => Category::all()
        ]);
    }

    /**
     * @param $request
     * Handle add product
     */
    public function handleAddProduct($request) {
        $discount = $request->discount ?? 0;
        $sale_price = ($request->regular_price * (100 - $discount)) / 100;
//        return response()->json(['data' => $request->all()]);
        $data_post = [
            'title' => $request->title,
            'description' => $request->description,
            'short_description' => $request->get('short_description', ''),
            'regular_price' => $request->regular_price,
            'sale_price' => $sale_price,
            'stock' => $request->stock,
            'discount' => $request->discount,
            'order' => $request->order ?? 0,
            'is_attr' => $request->is_attr
        ];

        $imageUpload = $this->uploadImage($request, 'image');
        if($imageUpload) {
            $data_post['images'] = $imageUpload;
        }

        $product = $this->productRepository->create($data_post);
        if($product) {
            ProductCategoryModel::create([
                'category_id' => $request->category_id,
                'product_id' => $product->id
            ]);

            return response()->json(['data' => 'Create product success!']);
        }

        return response()->json(['data' => 'Create product failed!'], 405);
    }

    /**
     * @param $request
     * @param $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showEditProduct($request, $id) {
        $product = $this->productRepository->findProductById($id);
        $category_id = ProductCategoryModel::where('product_id', $id)->first()->category_id;

        if(empty($product)) {
            return back()->with('error', 'Product not found');
        }

        return view('admin.products.edit', [
            'title_head' => 'Edit Product',
            'product' => $product,
            'categories' => Category::all(),
            'category_id' => $category_id
        ]);
    }

    /**
     * @param $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleEditProduct($request, $id) {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'discount' => 'numeric',
            'order' => 'numeric'
        ]);

        $product = $this->productRepository->findProductById($id);
        if(empty($product)) {
//            return back()->with('error', 'Product not found');
            return response()->json(['data' => 'Product not found!'], 422);
        }

        $discount = $request->discount ?? 0;
        $sale_price = ($request->regular_price * (100 - $discount)) / 100;

        $data_post = [
            'title' => $request->title,
            'description' => $request->description,
            'short_description' => $request->get('short_description', ''),
            'regular_price' => $request->regular_price,
            'sale_price' => $sale_price,
            'stock' => $request->stock,
            'discount' => $request->discount,
            'order' => $request->order,
            'is_attr' => $request->is_attr
        ];

        $image = $this->uploadImage($request, 'image');
        if($image) {
            $data_post['images'] = $image;
        }

        $result = ProductModel::where('id', $id)->update($data_post);
//        $result = $this->productRepository->updateProduct($id, $data_post);
        if($result) {
            ProductCategoryModel::where('product_id', $id)->update(['category_id' => $request->category_id]);
//            return back()->with('success', 'Update product success');
            return response()->json(['data' => 'Update product success']);
        }

//        return back()->with('error', 'Update product failed');
        return response()->json(['data' => 'Update product failed'], 422);

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showViewProduct($id) {
        $product = $this->productRepository->findProductById($id);
        if(empty($product)) {
            return back()->with('error', 'Product not found');
        }

        return view('admin.products.view', [
            'title_head' => 'View Product',
            'product' => $product
        ]);
    }

    /**
     * @param $id // id product.
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteProduct($id){
        $product = $this->productRepository->findProductById($id);
        if(empty($product)) {
            return response()->json(['success' => 'Product not found!']);
        }

        try{
            $this->productRepository->deleteProduct($id);
            $product->delete();
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
        }

        return response()->json(['success' => 'Delete success!']);
    }

    public function uploadImage($request, $name) {
        if($request->hasFile($name) && !empty($request->file($name))) {
            return Cloudinary::upload($request->file($name)->getRealPath())->getSecurePath();
        }

        return false;
    }
}
