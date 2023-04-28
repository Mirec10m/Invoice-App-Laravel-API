<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getFormattedIssuedAtAttribute()
    {
        return $this->format_date($this->issued_at);
    }

    public function getFormattedDeliveredAtAttribute()
    {
        return $this->format_date($this->delivered_at);
    }

    public function getFormattedDueAtAttribute()
    {
        return $this->format_date($this->due_at);
    }

    public function getFormattedPriceAttribute()
    {
        return $this->format_price($this->price);
    }

    public function getFormattedSumAttribute()
    {
        return $this->format_price($this->sum);
    }
}
