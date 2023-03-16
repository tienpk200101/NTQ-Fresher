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
        $this->category_service->handleAddCategory($request);

        return back()->with('success', 'Create category success!');
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
}
