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

    /**
     * It gets all the categories from the database and returns a view with the categories.
     * 
     * @return A view.
     */
    public function listCategory()
    {
        $categories = $this->category_service->getAllCategory();

        return view('admin.categories.index', [
            'title_head' => 'Category',
            'categories' => $categories
        ]);
    }

    /**
     * It returns a view with a title and a list of categories.
     * 
     * @return The view is being returned.
     */
    public function showAddCategory()
    {
        $categories = $this->category_service->getAllCategory();

        return view('admin.categories.add', [
            'title_head' => 'Add Category',
            'categories' => $categories
        ]);
    }

    /**
     * This function will handle the request from the form, then it will call the handleAddCategory
     * function in the CategoryService class to add the category to the database, then it will redirect
     * to the list category page with a success message.
     * 
     * @param CategoryRequest request The request object.
     * 
     * @return The return value of the last statement in the try block.
     */
    public function handleAddCategory(CategoryRequest $request)
    {
        try {
            $this->category_service->handleAddCategory($request);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect(route('admin.list_category.show'))
            ->with('success', 'Create category success!');
    }

    public function showEditCategory($id)
    {
        $category = $this->category_service->findCategory($id);
        $categories = $this->category_service->getAllCategory();

        return view('admin.categories.edit', [
            'title_head' => 'Edit Category',
            'category' => $category,
            'categories' => $categories
        ]);
    }

    public function handleEditCategory($id, CategoryRequest $request)
    {
        try {
            $this->category_service->handleEditCategory($id, $request);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return back()->with('success', 'Create category success!');
    }

    public function deleteCategory($id, Request $request)
    {
        try {
            $this->category_service->deleteCategory($id);
        } catch (\Exception $e) {
            return back()->with('error', 'Can\'t delete this row');
        }

        return back()->with('success', 'Delete Category Success!');
    }
}
