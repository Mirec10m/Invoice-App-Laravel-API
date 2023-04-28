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
            'issued_at' => $this->issued_at,
            'formatted_issued_at' => $this->formatted_issued_at,
            'delivered_at' => $this->delivered_at,
            'formatted_delivered_at' => $this->formatted_delivered_at,
            'due_at' => $this->due_at,
            'formatted_due_at' => $this->formatted_due_at,
            'item' => $this->item,
            'quantity' => $this->quantity,
            'unit' => $this->unit,
            'price' => $this->price,
            'formatted_price' => $this->formatted_price,
            'sum' => $this->sum,
            'formatted_sum' => $this->formatted_sum,
            'user' => new UserResource($this->whenLoaded('user')),
            'customer' => new CustomerResource($this->whenLoaded('customer')),
            'created_at' => $this->created_at,
            'formatted_created_at' => $this->formatted_created_at
        ];
    }
}
