<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/user', [AuthController::class, 'user']);

Route::middleware('auth:sanctum')->group(function () {

    // Customers
    Route::apiResource('/customers', CustomerController::class);

    // Invoices
    Route::apiResource('/invoices', InvoiceController::class);
    Route::get('/last-invoice', [InvoiceController::class, 'last_invoice']);
    Route::get('/invoices-sum', [InvoiceController::class, 'invoices_sum']);
    Route::get('/invoices/pdf/{invoice}', [InvoiceController::class, 'invoices_pdf']);
});
