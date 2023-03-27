<?php

namespace App\Services\Admin;

use App\Models\AttributeModel;
use App\Models\AttributeVariableModel;
use App\Models\ProductModel;
use App\Models\ProductCategoryModel;
use App\Models\ProductVariableModel;
use App\Models\TermModel;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductVariableService
{
    public function listProductVariable($id) {
        $product = ProductModel::find($id);
        $product_variables = ProductVariableModel::where('product_id', $id)->get();
        foreach ($product_variables as $product_variable) {
            $attr_variables = DB::table('attr_variables')
                ->join('attributes', 'attr_variables.attr_id', '=', 'attributes.id')
                ->join('terms', 'attributes.term_id', '=', 'terms.id')
                ->where('product_variable_id', $product_variable->id)
                ->get();

            foreach ($attr_variables as $attr_variable) {
                $product_variable[$attr_variable->slug] = $attr_variable->value;
            }
        }

        return view('admin.product_variables.index', [
            'title_head' => 'Product Variables',
            'product_variables' => $product_variables,
            'product' => $product
        ]);
    }

    public function showAddProductVariable($id) {
        $terms = TermModel::all();
        $arr_term = [];
        foreach ($terms as $term) {
            $arr_term[$term->slug] = AttributeModel::where('term_id', $term->id)->get();
        }

        return view('admin.product_variables.add', [
            'title_head' => 'Add Product Variable',
            'product_id' => $id,
            'terms' => $arr_term
        ]);
    }

    /**
     * @param int $id
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function handleAddProductVariable(int $id, $request) {
        $data = $request->only(['discount', 'regular_price', 'stock']);
        $attribute = $request->only(['color', 'size']);
        $product_variables = [];

        foreach ($data as $key => $item) {
            foreach ($item as $key_item => $value) {
                $product_variables[$key_item][$key] = $value;
            }
        }

        $data_post = [];
        foreach ($product_variables as $key => $product_variable) {
            $validated = Validator::make($product_variable, [
                'regular_price' => 'required|numeric',
                'discount' => 'numeric',
                'stock' => 'numeric'
            ]);

            if($validated->fails()) {
                return response()->json(['errors' => $validated->errors()->first()], 422);
            }

            $data_validate = $validated->validated();

            $data_post[$key] = $data_validate;
            $data_post[$key]['product_id'] = $id;
            $data_post[$key]['sale_price'] = (int)$data_validate['regular_price'] * ((100 - (int)$data_validate['discount'])/100);
        }

        $image_keys = array_keys($_FILES);
        foreach ($image_keys as $key => $name) {
            $data_post[$key]['image'] = Cloudinary::upload($request->file($name)->getRealPath())->getSecurePath();
        }

        foreach ($data_post as $key => $data_store) {
            try{
                try {
                    $product_variable_id = ProductVariableModel::firstOrCreate($data_store)->id;
                } catch (\Exception $e) {
                    return response()->json(['error' => "Variation #". ++$key ." already exists"], 422);
                }

                foreach ($attribute as $key_value => $value) {
                    $id_term = TermModel::where('slug', $key_value)->first()->id;
                    $id_attribute = AttributeModel::firstOrCreate(['term_id' => $id_term, 'value' => $value[$key], 'slug' => Str::slug($value[$key])])->id;

                    AttributeVariableModel::create(['attr_id' => $id_attribute, 'product_variable_id' => $product_variable_id]);
                }

            } catch (\Exception $e) {
                return response()->json(['error' => 'Create product variable failed'], 422);
            }
        }

        return response()->json(['data' => 'Creating Variations Success']);
    }

    public function showEditProductVariable($id) {
        $product_variable = ProductVariableModel::find($id);
        $terms = TermModel::all();
        $arr_term = [];

        $attr_variables = DB::table('attr_variables')
            ->join('attributes', 'attr_variables.attr_id', '=', 'attributes.id')
            ->join('terms', 'attributes.term_id', '=', 'terms.id')
            ->where('product_variable_id', $id)
            ->get();

        foreach ($terms as $term) {
            $arr_term[$term->slug] = AttributeModel::where('term_id', $term->id)->get();
        }

        foreach ($attr_variables as $attr_variable) {
            $product_variable[$attr_variable->slug] = $attr_variable->attr_id;
        }

        return view('admin.product_variables.edit',[
            'title_head' => 'Edit Product Variable',
            'product_variable' => $product_variable,
            'terms' => $arr_term
        ]);
    }

    public function handleEditProductVariable($id, $request) {
        $attr_variables = AttributeVariableModel::where('product_variable_id', $id)->get();
        $product_variable = ProductVariableModel::find($id);
        if(empty($product_variable)) {
            return back()->with('error', 'Product variable not found!');
        }

        $sale_price = ((int)$request->regular_price * (100 - (int)$request->discount)) / 100;
        $data = [
            'stock' => (int)$request->get('stock', 0),
            'description' => $request->get('description'),
            'discount' => (int)$request->discount,
            'regular_price' => (int)$request->get('regular_price', 0),
            'sale_price' => $sale_price,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $data_attr = [$request->get('color', 0), $request->get('size', 0)];

        $uploadImage = $this->uploadImage($request, 'image');
        if($uploadImage) {
            $data['image'] = $uploadImage;
        }

        try {
            ProductVariableModel::where('id', $id)->update($data);
            foreach ($attr_variables as $key => $item) {
                $item->update(['attr_id' => $data_attr[$key]]);
            }

        } catch(\Exception $e) {
            return back()->with('error', 'Update product variable failed!');
        }

        return redirect(route('admin.product_variable.index', $product_variable->product_id))->with('success', 'Update product variable successful');
    }

    public function deleteProductVariable($id) {
        $productVariable = ProductVariableModel::find($id);
        if(empty($productVariable)) {
            return back()->with('error', 'Doesn\'t found this product variable!');
        }

        try {
            $productVariable->delete();
            $attr_variables = AttributeVariableModel::where('product_variable_id', $id)->get();
            try {
                foreach ($attr_variables as $attr_variable) {
                    $attr_variable->delete();
                }
            }catch(\Exception $e) {
                return back()->with('error', 'Delete attribute variable failed');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Delete this product variable failed');
        }

        return response()->json(['code' => 1]);
    }

    public function uploadImage($request, $nameImage) {
        if($request->hasFile($nameImage) && !empty($request->file($nameImage))) {
            return Cloudinary::upload($request->file($nameImage)->getRealPath())->getSecurePath();
        }

        return false;
    }
}
