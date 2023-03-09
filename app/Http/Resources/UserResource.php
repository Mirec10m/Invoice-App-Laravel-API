<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'company_name' => $this->company_name,
            'company_address' => $this->company_address,
            'company_postal_code' => $this->company_postal_code,
            'company_city' => $this->company_city,
            'company_country' => $this->company_country,
            'bussines_id' => $this->business_id,
            'tax_id' => $this->tax_id,
            'vat_id' => $this->vat_id,
            'vat' => $this->vat,
            'iban' => $this->iban
        ];
    }
}
