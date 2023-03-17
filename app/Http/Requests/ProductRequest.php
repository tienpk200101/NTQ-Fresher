<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required|required',
            'regular_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'order' => 'nullable|numeric',
            'images' => 'required|image|size:max:5120'
        ];
    }
}
