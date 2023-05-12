<?php

namespace App\Http\Requests\Invoice;

class UpdateInvoiceRequest extends CreateInvoiceRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = parent::rules();

        return $rules;
    }
}
