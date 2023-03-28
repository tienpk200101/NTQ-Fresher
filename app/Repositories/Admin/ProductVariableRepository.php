<?php

namespace App\Repositories\Admin;

use App\Models\ProductVariableModel;
use App\Repositories\BaseRepository;

class ProductVariableRepository extends BaseRepository {

    public function getModel()
    {
        return ProductVariableModel::class;
    }

    public function createProductVariable($attributes = [])
    {
        return parent::create($attributes);
    }

    public function findProductVariableById($id)
    {
        return parent::find($id);
    }

    public function updateProductVariable($id, $attributes = [])
    {
        return parent::update($id, $attributes);
    }

    public function deleteProductVariable($id)
    {
        return parent::delete($id);
    }
}
