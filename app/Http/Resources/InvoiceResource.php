<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'number' => $this->number,
            'variable_symbol' => $this->variable_symbol,
            'due_at' => Carbon::parse($this->due_at)->format('d. m. Y'),
            'item' => $this->item,
            'price' => $this->price,
            'formatted_price' => $this->price ? number_format($this->price, 2, ',', ' ') : null,
            'user' => new UserResource($this->whenLoaded('user')),
            'customer' => new CustomerResource($this->whenLoaded('customer'))
        ];
    }
}
