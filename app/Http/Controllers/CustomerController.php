<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customers\CreateCustomerRequest;
use App\Http\Requests\Customers\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Customer::class, 'customer');
    }

    public function index()
    {
        $customers = Customer::where('user_id', Auth::user()->id)->paginate(20);

        return CustomerResource::collection($customers);
    }

    public function store(CreateCustomerRequest $request)
    {
        $customer = Customer::create($request->validated());

        $customer->user()->associate(Auth::user()->id)->save();

        return response(new CustomerResource($customer), Response::HTTP_CREATED);
    }

    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        return response(new CustomerResource($customer), Response::HTTP_ACCEPTED);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
