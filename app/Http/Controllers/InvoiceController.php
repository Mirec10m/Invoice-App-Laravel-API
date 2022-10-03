<?php

namespace App\Http\Controllers;

use App\Http\Requests\Invoice\CreateInvoiceRequest;
use App\Http\Requests\Invoice\UpdateInvoiceRequest;
use App\Http\Resources\InvoiceResource;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::where('user_id', Auth::user()->id)->with('customer')->paginate(20);

        return InvoiceResource::collection($invoices);
    }

    public function store(CreateInvoiceRequest $request)
    {
        $invoice = Invoice::create($request->validated());

        $user = User::findOrFail(Auth::user()->id);
        $user->invoices()->save($invoice);

        if($id = $request->customer_id){
            $customer = Customer::findOrFail($id);
            $customer->invoices()->save($invoice);
        }

        return response(new InvoiceResource($invoice->load('customer')), Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return new InvoiceResource(Invoice::with('customer')->findOrFail($id));
    }

    public function update(UpdateInvoiceRequest $request, $id)
    {
        $invoice = Invoice::findOrFail($id);

        if($id = $request->customer_id){
            $customer = Customer::findOrFail($id);
            $customer->invoices()->save($invoice);
        }

        $invoice->update($request->validated());

        return response(new InvoiceResource($invoice), Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Invoice::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
