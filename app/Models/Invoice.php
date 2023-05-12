<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'number',
        'variable_symbol',
        'issued_at',
        'delivered_at',
        'due_at',
        'item',
        'quantity',
        'unit',
        'price',
        'sum'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function getFormattedIssuedAtAttribute(): ?string
    {
        return $this->format_date($this->issued_at);
    }

    public function getFormattedDeliveredAtAttribute(): ?string
    {
        return $this->format_date($this->delivered_at);
    }

    public function getFormattedDueAtAttribute(): ?string
    {
        return $this->format_date($this->due_at);
    }

    public function getFormattedPriceAttribute(): ?string
    {
        return $this->format_price($this->price);
    }

    public function getFormattedSumAttribute(): ?string
    {
        return $this->format_price($this->sum);
    }
}
