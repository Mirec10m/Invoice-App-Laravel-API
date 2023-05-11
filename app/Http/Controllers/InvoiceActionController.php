<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Services\InvoiceService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class InvoiceActionController extends Controller
{
    protected $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->authorizeResource(Invoice::class, 'invoice');
        $this->invoiceService = $invoiceService;
    }

    public function last_invoice()
    {
        $invoice = Invoice::where('user_id', Auth::user()->id)->get()->last();

        return $invoice
            ? response(new InvoiceResource($invoice), Response::HTTP_OK)
            : response(null, Response::HTTP_OK);
    }

    public function invoices_sum()
    {
        $invoices = Invoice::where('user_id', Auth::user()->id)->with(['customer']);

        $invoices = $this->invoiceService->filter_by_number_or_sum_or_customer(request(), $invoices);

        $sum = $invoices->sum('sum');

        return response($sum, Response::HTTP_OK);
    }

    public function invoices_pdf(Invoice $invoice)
    {
        $pdf = Pdf::loadView('pdf.invoice', ['invoice' => $invoice->load('customer')]);

        return $pdf->download();
    }
}
