<?php

namespace App\Http\Requests\Detail;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'quantity' => 'numeric',
            'price' => 'numeric',
            'invoice' => 'numeric|exists:invoices,id',
            'subcategory' => 'numeric|exists:subcategories,id',
        ];
    }
}
