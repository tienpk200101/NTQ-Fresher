<?php

namespace App\Repositories\Admin;

use App\Repositories\BaseRepository;
use App\Models\Product;

class ProductRepository extends BaseRepository {

    public function getModel()
    {
        return Product::class;
    }

    public function getAllProduct()
    {
        return $this->getAll(); // TODO: Change the autogenerated stub
    }

    public function createProduct($attributes = [])
    {
        return parent::create($attributes); // TODO: Change the autogenerated stub
    }

    public function findProductById($id)
    {
        return parent::find($id); // TODO: Change the autogenerated stub
    }

    public function updateProduct($id, $attributes = [])
    {
        return parent::update($id, $attributes); // TODO: Change the autogenerated stub
    }

    public function deleteProduct($id)
    {
        return parent::delete($id); // TODO: Change the autogenerated stub
    }
}
