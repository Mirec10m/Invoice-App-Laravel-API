<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customers\CreateCustomerRequest;
use App\Http\Requests\Customers\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    public function index()
    {
        return CustomerResource::collection(Customer::paginate(20));
    }

    public function store(CreateCustomerRequest $request)
    {
        $customer = Customer::create($request->validated());

        return response(new CustomerResource($customer), Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return new CustomerResource(Customer::findOrFail($id));
    }

    public function update(UpdateCustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->update($request->validated());

        return response(new CustomerResource($customer), Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Customer::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
