<?php

namespace App\Http\Controllers;

use App\Http\Requests\Invoice\CreateInvoiceRequest;
use App\Http\Requests\Invoice\UpdateInvoiceRequest;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Services\InvoiceService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class InvoiceController extends Controller
{
    protected $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->authorizeResource(Invoice::class, 'invoice');
        $this->invoiceService = $invoiceService;
    }

    public function index()
    {
        $invoices = Invoice::where('user_id', Auth::user()->id)->with(['user', 'customer']);

        $invoices = $this->invoiceService->filter_by_number_or_sum_or_customer(request(), $invoices);

        $invoices = $invoices->paginate(20);

        return InvoiceResource::collection($invoices);
    }

    public function store(CreateInvoiceRequest $request)
    {
        $invoice = Invoice::create($request->validated());

        $this->invoiceService->assign_to_current_user($invoice);
        $this->invoiceService->assign_to_customer($invoice, $request);

        return response(new InvoiceResource($invoice->load(['user', 'customer'])), Response::HTTP_CREATED);
    }

    public function show(Invoice $invoice)
    {
        return new InvoiceResource($invoice->load(['user', 'customer']));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->validated());

        $this->invoiceService->assign_to_customer($invoice, $request);

        return response(new InvoiceResource($invoice->load(['user', 'customer'])), Response::HTTP_ACCEPTED);
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
