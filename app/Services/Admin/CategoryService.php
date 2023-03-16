<?php

namespace App\Services\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
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
}
