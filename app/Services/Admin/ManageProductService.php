<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategoryModel;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ManageProductService
{
    public function showManageProduct() {
        return view('admins.products.index', [
            'title_head' => 'Manage Product',
            'products' => Product::all()
        ]);
    }

    public function showAddProduct() {
        return view('admins.products.add', [
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
        $sale_price = ($request->price * (100 - $discount)) / 100;

        $data_post = [
            'title' => $request->title,
            'description' => $request->description,
            'short_description' => $request->get('short_description', ''),
            'regular_price' => $request->price,
            'sale_price' => $sale_price,
            'stock' => $request->stock,
            'discount' => $request->discount,
            'order' => $request->order,
        ];

        if($request->hasFile('images') && !empty($request->file('images'))) {
            $uploadedFileUrl = Cloudinary::upload($request->file('images')->getRealPath())->getSecurePath();
            $data_post['images'] = $uploadedFileUrl;
        }

        $product = Product::create($data_post);
        if($product) {
            ProductCategoryModel::create([
                'category_id' => $request->category_id,
                'product_id' => $product->id
            ]);

            return redirect(route('admin.product.show'))->with('success', 'Create product success');
        }

        return back()->with('error', 'Create product failed');
    }

    public function showEditProduct($request, $id) {
        $product = Product::find($id);
        if(empty($product)) {
            return back()->with('error', 'Product not found');
        }

        return view('admins.products.edit', [
            'title_head' => 'Edit Product',
            'product' => $product
        ]);
    }

    public function handleEditProduct($request, $id) {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'discount' => 'required|numeric',
            'order' => 'required|numeric'
        ]);

        $product = Product::find($id);
        if(empty($product)) {
            return back()->with('error', 'Product not found');
        }

//        $data = $request->only(['title', 'description', 'price', 'stock', 'order', 'discount']);
        $data = $request->post();
        if($request->hasFile('image') && !empty($request->file('image'))) {
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $data = array_merge($data, ['image' => $uploadedFileUrl]);
        }

        unset($data['_token'], $data['formAction'], $data['choices-category-input']);

        $result = Product::where('id', $id)->update($data);
        if($result) {
            return back()->with('success', 'Update product success');
        }

        return back()->with('error', 'Update product failed');
    }

    public function showViewProduct($id) {
        $product = Product::find($id);
        if(empty($product)) {
            return back()->with('error', 'Product not found');
        }

        return view('admins.products.view', [
            'title_head' => 'View Product',
            'product' => $product
        ]);
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        if(empty($product)) {
            return back()->with('error', 'Product not found');
        }

        $result = $product->delete();
        if($result) {
            return back()->with('success', 'Delete product successfully');
        }
        return back()->with('error', 'Delete product failed');
    }
}
