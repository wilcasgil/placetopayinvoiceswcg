<?php

namespace App\Http\Requests\Subcategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|between:3,100|regex:/^[\pL\s\-]+$/u|unique:subcategories',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category' => 'required|numeric|exists:categories,id',
        ];
    }
}
