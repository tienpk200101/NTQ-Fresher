<?php

namespace App\Services\Admin;

use App\Models\AttributeModel;
use App\Repositories\Admin\AttributeRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AttributeService
{
    /**
     * @var AttributeRepository
     */
    protected $attributeRepository;

    /**
     * @param AttributeRepository $attributeRepository
     */
    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * @return \App\Repositories\All
     */
    public function getAllAttributes() {
        return $this->attributeRepository->getAllAttribute();
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

        return $this->attributeRepository->createAttribute($data);
    }

    /**
     * @param $id
     * @param $request
     * @return \App\Repositories\The|false
     */
    public function updateAttribute(int $id, $request) {
        $request->validate([
            'value' => 'required|min:1|unique:attributes,value,' . $id
        ]);

        $attribute = $this->attributeRepository->findAttributeById($id);
        $data = [
            'value' => $request->value,
            'term_id' => $attribute->term_id,
            'slug' => Str::slug($request->value),
        ];

        return $this->attributeRepository->updateAttribute($id, $data);
    }

    /**
     * @param $id
     * @return \App\Repositories\The
     */
    public function findAttribute($id) {
        return $this->attributeRepository->findAttributeById($id);
    }

    /**
     * @param $id
     * @return \App\Repositories\The|bool
     */
    public function deleteAttribute($id) {
        return $this->attributeRepository->deleteAttribute($id);
    }
}
