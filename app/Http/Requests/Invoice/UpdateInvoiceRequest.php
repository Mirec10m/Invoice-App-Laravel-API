<?php

namespace App\Http\Requests\Invoice;

class UpdateInvoiceRequest extends CreateInvoiceRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = parent::rules();

        $rules['number'] = str_replace('required', 'nullable', $rules['number']);

        return $rules;
    }
}
