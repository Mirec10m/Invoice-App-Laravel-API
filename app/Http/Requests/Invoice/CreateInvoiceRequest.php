<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class CreateInvoiceRequest extends FormRequest
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
            'number' => 'required|digits_between:5,20|unique:invoices,number',
            'variable_symbol' => 'nullable|numeric|min:6',
            'issued_at' => 'nullable|date_format:Y-m-d',
            'delivered_at' => 'nullable|date_format:Y-m-d',
            'due_at' => 'nullable|date_format:Y-m-d',
            'item' => 'nullable|string|max:255',
            'quantity' => 'nullable|integer|numeric',
            'unit' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|between:0.00,99999999.99',
            'sum' => 'nullable|numeric|between:0.00,99999999.99',
            'customer_id' => 'nullable|exists:customers,id'
        ];
    }
}
