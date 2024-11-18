<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\Employee\StoreEmployeeRequest;

class EmployeeController extends Controller
{
    public function index() {
        $employees = Employee::with(['speciality'])->get();
        return response()->json($employees);
    }

    public function store(StoreEmployeeRequest $request) {
        $employee = Employee::create($request->validated());
        return response()->json(['msg' => 'Employee created successfully', 'Employee' => $employee], 201);
    }

    public function show($id) {
        $employee = Employee::find($id);
        return $employee ? response()->json(['Employee' => $employee]) : response()->json(['msg' => 'Employee not found'], 404);
    }

    public function update(StoreEmployeeRequest $request, Employee $employee) {
        Employee::find($employee->id)->update($request->validated());
        return response()->json(['msg' => 'Employee updated successfully', 'Employee' => $employee], 201);
    }

    public function destroy(Employee $employee) {
        $employee->delete();
        return response()->json(['msg' => 'Employee deleted successfully'], 204);
    }
}
