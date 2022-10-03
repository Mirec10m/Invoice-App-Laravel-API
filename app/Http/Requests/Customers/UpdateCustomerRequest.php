<?php

namespace App\Http\Requests\Customers;

class UpdateCustomerRequest extends CreateCustomerRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return parent::rules();
    }
}
