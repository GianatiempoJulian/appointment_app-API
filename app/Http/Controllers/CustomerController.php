<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Http\Requests\Customer\StoreCustomerRequest;

class CustomerController extends Controller
{
    
    public function index() {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function store(StoreCustomerRequest $request) {
        $customer = Customer::create($request->validated());
        return response()->json(['msg' => 'Customer created successfully', 'customer' => $customer], 201);
    }

    public function show($id) {
        $customer = Customer::find($id);
        return $customer ? response()->json(['customer' => $customer]) : response()->json(['msg' => 'Customer not found'], 404);
    }

    public function update(StoreCustomerRequest $request, Customer $customer) {
        Customer::find($customer->id)->update($request->validated());
        return response()->json(['msg' => 'Customer updated successfully', 'customer' => $customer], 201);
    }

    public function destroy(Customer $customer) {
        $customer->delete();
        return response()->json(['msg' => 'Customer deleted successfully'], 204);
    }
}
