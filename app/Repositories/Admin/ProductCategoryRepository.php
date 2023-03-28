<?php

namespace App\Repositories\Admin;

use App\Models\ProductCategoryModel;
use App\Repositories\BaseRepository;

class ProductCategoryRepository extends BaseRepository {
    public function getModel()
    {
        return ProductCategoryModel::class;
    }

    public function getAllProductCategory()
    {
        return $this->getAll();
    }

    public function createProductCategory($attributes = [])
    {
        return parent::create($attributes);
    }

    public function findProductCategoryById($id)
    {
        return parent::find($id);
    }

    public function updateProductCategory($id, $attributes = [])
    {
        return parent::update($id, $attributes);
    }

    public function deleteProductCategory($id)
    {
        return parent::delete($id);
    }
}
