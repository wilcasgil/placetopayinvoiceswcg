<?php

namespace App\Http\Requests\Invoice;

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
            'due_date' => 'required|date',
            'receipt_date' => 'required|date',
            'payment_type' => 'numeric|exists:payment_types,id',
            'client' => 'numeric|exists:clients,id',
            'invoice_state' => 'numeric|exists:invoice_states,id',
        ];
    }
}
