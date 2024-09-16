<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
    public function index() {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
        ]);
        $customer = Customer::create($validated);
        return response()->json(['msg' => 'Customer created successfully', 'customer' => $customer], 201);
    }

    public function show($id) {
        $customer = Customer::find($id);
        if($customer){
            return response()->json(['customer' => $customer]); 
        }else{
            return response()->json(['msg' => 'Customer not found'],404); 
        }
    }

    public function update(Request $request, Customer $customer) {
        $validated = $request->validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
        ]);
        Customer::find($customer->id)->update($validated);
        return response()->json(['msg' => 'Customer updated successfully', 'customer' => $customer], 201);
    }

    public function destroy(Customer $customer) {
        $customer->delete();
        return response()->json(['msg' => 'Customer deleted successfully'], 204);
    }
}
