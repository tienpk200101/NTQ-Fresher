<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeModel;
use App\Models\TermModel;
use App\Services\Admin\AttributeService;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * @var AttributeService
     */
    public $attributeService;

    /**
     * @param AttributeService $attributeService
     */
    public function __construct(AttributeService $attributeService)
    {
        $this->attributeService = $attributeService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listAttribute($id)
    {
        $attributes = AttributeModel::where('term_id', $id)->get();
        $terms = TermModel::all();

        return view('admin.attributes.index', [
            'title_head' => 'Attribute',
            'attributes' => $attributes,
            'terms' => $terms
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleAddAttribute(Request $request)
    {
        try {
            $this->attributeService->createAttribute($request);
        } catch (\Exception $e) {
            return back()->with('error', 'Create term attribute failed');
        }

        return back()->with('success', 'Create term attribute success!');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function findAttribute($id) {
        $attribute = AttributeModel::find($id);

        return response()->json(['code' => 1, 'data' => $attribute]);
    }

    /**
     * @param $slug
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showEditAttribute($slug, $id)
    {
        $attribute = $this->attributeService->findAttribute($id);
        $term_id = TermModel::where('slug', $slug)->first()->id;

        return view('admin.attributes.edit', [
            'head_title' => 'Edit Attribute',
            'attribute' => $attribute,
            'term_id' => $term_id
        ]);
    }

    /**
     * @param $term_id
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleEditAttribute($term_id, $id, Request $request) {
        try {
            $this->attributeService->updateAttribute($id, $request);
        } catch (\Exception $e) {
            return back()->with('error', 'Update attribute failed');
        }

        return redirect(route('admin.attribute.index', $term_id))
            ->with('success', 'Update attribute success!');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAttribute($id) {
        try {
            $this->attributeService->deleteAttribute($id);
        } catch (\Exception $e) {
            return response()->json(['code' => 0]);
        }

        return response()->json(['code' => 1]);
    }
}
