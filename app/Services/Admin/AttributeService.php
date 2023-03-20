<?php

namespace App\Services\Admin;

use App\Models\AttributeModel;
use App\Repositories\AttributeRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AttributeService
{
    /**
     * @var AttributeRepository
     */
    protected $attributeRipository;

    /**
     * @param AttributeRepository $attributeRepository
     */
    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRipository = $attributeRepository;
    }

    /**
     * @return \App\Repositories\All
     */
    public function getAllAttributes() {
        return $this->attributeRipository->getAll();
    }

    /**
     * @param $request
     * @return \App\Repositories\The
     */
    public function createAttribute($request) {
        $request->validate([
            'value' => 'required|min:1|unique:attributes',
            'term_id' => 'required'
        ]);

        $data = [
            'value' => $request->value,
            'term_id' => $request->term_id,
            'slug' => Str::slug($request->value),
        ];

        return $this->attributeRipository->createAttribute($data);
    }

    /**
     * @param $id
     * @param $request
     * @return \App\Repositories\The|false
     */
    public function updateAttribute($id, $request) {
        $request->validate([
            'value' => 'required|min:1|unique:attributes,value,' . $id
        ]);

        $attribute = AttributeModel::find($id);
        $data = [
            'value' => $request->value,
            'term_id' => $attribute->term_id,
            'slug' => Str::slug($request->value),
        ];

        return $this->attributeRipository->updateAttribute($id, $data);
    }

    /**
     * @param $id
     * @return \App\Repositories\The
     */
    public function findAttribute($id) {
        return $this->attributeRipository->findAttributeById($id);
    }

    /**
     * @param $id
     * @return \App\Repositories\The|bool
     */
    public function deleteAttribute($id) {
        return $this->attributeRipository->deleteAttribute($id);
    }
}
