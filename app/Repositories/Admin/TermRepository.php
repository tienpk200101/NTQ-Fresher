<?php

namespace App\Repositories\Admin;

use App\Models\Term;
use App\Repositories\BaseRepository;

class TermRepository extends BaseRepository {

    public function getModel()
    {
        return Term::class;
    }

    public function getAllTerm()
    {
        return $this->getAll();
    }

    public function createTerm($attributes = [])
    {
        return parent::create($attributes);
    }

    public function findTermById($id)
    {
        return parent::find($id);
    }

    public function updateTerm($id, $attributes = [])
    {
        return parent::update($id, $attributes);
    }

    public function deleteTerm($id)
    {
        return parent::delete($id);
    }
}
