<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceService
{
    public function assign_to_current_user(Invoice $invoice)
    {
        $invoice->user()->associate(Auth::user()->id)->save();
    }

    public function assign_to_customer(Invoice $invoice, Request $request)
    {
        if($id = $request->customer_id){
            $invoice->customer()->associate($id)->save();
        }
    }
}
