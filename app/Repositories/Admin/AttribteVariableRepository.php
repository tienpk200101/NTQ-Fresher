<?php

namespace App\Repositories\Admin;

use App\Models\AttributeVariableModel;
use App\Repositories\BaseRepository;

class AttribteVariableRepository extends BaseRepository {

    public function getModel()
    {
        return AttributeVariableModel::class;
    }

    public function getAllAttributeVariable()
    {
        return $this->getAll();
    }

    public function createAttributeVariable($attributes = [])
    {
        return parent::create($attributes);
    }

    public function findAttributeVariableById($id)
    {
        return parent::find($id);
    }

    public function updateAttributeVariable($id, $attributes = [])
    {
        return parent::update($id, $attributes);
    }

    public function deleteAttributeVariable($id)
    {
        return parent::delete($id);
    }
}
