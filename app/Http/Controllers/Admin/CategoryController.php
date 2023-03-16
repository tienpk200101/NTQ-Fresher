<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\Admin\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category_service;

    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
    }

    public function listCategory() {
        $categories = $this->category_service->getAllCategory();

        return view('admins.categories.index', [
            'title_head' => 'Category',
            'categories' => $categories
        ]);
    }

    public function showAddCategory(){
        $categories = $this->category_service->getAllCategory();

        return view('admins.categories.add', [
            'title_head' => 'Add Category',
            'categories' => $categories
        ]);
    }

    public function handleAddCategory(CategoryRequest $request){
        try {
            $this->category_service->handleAddCategory($request);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect(route('admin.list_category.show'))
            ->with('success', 'Create category success!');
    }

    public function showEditCategory($id){
        $category = $this->category_service->findCategory($id);
        $categories = $this->category_service->getAllCategory();

        return view('admins.categories.edit', [
            'title_head' => 'Edit Category',
            'category' => $category,
            'categories' => $categories
        ]);
    }

    public function handleEditCategory($id, CategoryRequest $request) {
        try {
            $this->category_service->handleEditCategory($id, $request);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return back()->with('success', 'Create category success!');
    }

    public function deleteCategory($id, Request $request){
        try {
            $this->category_service->deleteCategory($id);
        }catch (\Exception $e) {
            return back()->with('error', 'Can\'t delete this row');
        }

        return back()->with('success', 'Delete Category Success!');
    }
}
