<?php

namespace App\Services\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\Admin\CategoryRepository;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Str;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategory(){
        return $this->categoryRepository->getAllCategory();
    }


    public function handleAddCategory($request) {
        $data = $request->all();

        if($request->hasFile('thumbnail') && !empty($request->file('thumbnail'))) {
            $thumbnail = Cloudinary::upload($request->file('thumbnail')->getRealPath())->getSecurePath();
            $data['thumbnail'] = $thumbnail;
        }

        $data['slug'] = Str::slug($data['title']);
        unset($data['_token']);

        try {
            $result = $this->categoryRepository->createCategory($data);
        } catch(\Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }

    public function findCategory($id) {
        return $this->categoryRepository->findCategoryById($id);
    }

    public function handleEditCategory($id, $request) {
        $data = $request->all();

        if($request->hasFile('thumbnail') && !empty($request->file('thumbnail'))) {
            $thumbnail = Cloudinary::upload($request->file('thumbnail')->getRealPath())->getSecurePath();
            $data['thumbnail'] = $thumbnail;
        }

        $data['slug'] = Str::slug($data['title']);
        $data['category_id'] = (int)$data['category_id'];
        unset($data['_token']);

        try {
            return $this->categoryRepository->updateCategory($id, $data);
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function deleteCategory($id){
        $category_child = Category::where('parent_id', $id)->get();
        if(count($category_child)) {
            return false;
        }

        return $this->categoryRepository->deleteCategory($id);
    }
}
