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
        $user = User::findOrFail(Auth::user()->id);
        $user->invoices()->save($invoice);
    }

    public function assign_to_customer(Invoice $invoice, Request $request)
    {
        if($id = $request->customer_id){
            $customer = Customer::findOrFail($id);
            $customer->invoices()->save($invoice);
        }
    }
}
