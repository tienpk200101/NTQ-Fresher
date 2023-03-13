<?php

namespace App\Services\Admin;

use App\Models\Product;
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
            'title_head' => 'Add Product'
        ]);
    }

    /**
     * @param $request
     * Handle add product
     */
    public function handleAddProduct($request) {
//        $request->validate([
//            'title' => 'required|max:255',
//            'description' => 'required',
//            'price' => 'required|numeric',
//            'stock' => 'required|numeric',
//            'discount' => 'required|numeric',
//            'order' => 'required|numeric',
//            'image' => 'required|image'
//        ]);
        if($request->hasFile('image') && !empty($request->file('image'))) {
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        }

        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => 1,
            'price' => $request->price,
            'stock' => $request->stock,
            'discount' => $request->discount,
            'order' => $request->order,
            'image' => $uploadedFileUrl
        ]);

        if($product) {
            return back()->with('success', 'Create product success');
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
