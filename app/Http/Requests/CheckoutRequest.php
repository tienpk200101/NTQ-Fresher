<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'firstName' => 'required|min:3|max:255',
            'lastName' => 'required|min:3|max:255',
            'email' => 'required|email|min:6|max:255',
            'phone' => 'required',
            'address' => 'required|min:6|max:255',
            'zipCode' => 'required|min:2'
        ];
    }
}
