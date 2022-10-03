<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'business_id',
        'tax_id',
        'vat_number',
        'street',
        'city',
        'postal_code',
        'country',
        'email',
        'phone'
    ];
}
