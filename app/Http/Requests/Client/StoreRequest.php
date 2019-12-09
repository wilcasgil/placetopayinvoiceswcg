<?php

namespace App\Http\Requests\Client;

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
            'name' => 'required|between:3,100|regex:/^[\pL\s\-]+$/u|unique:clients',
            'last_name' => 'required|between:3,100|regex:/^[\pL\s\-]+$/u|unique:clients',
            'email' => 'required|email|max:90|unique:clients,email',
            'country' => 'required|numeric|exists:clients,id',
            //'status' => 'required|numeric|exists:clients,id',
        ];
    }
}
