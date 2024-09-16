<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        $employees = Employee::with(['speciality'])->get();
        return response()->json($employees);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'speciality_id' => 'required|integer'
        ]);
        $employee = Employee::create($validated);
        return response()->json(['msg' => 'Employee created successfully', 'Employee' => $employee], 201);
    }

    public function show($id) {
        $employee = Employee::find($id);
        if($employee){
            return response()->json(['Employee' => $employee]); 
        }else{
            return response()->json(['msg' => 'Employee not found'],404); 
        }
    }

    public function update(Request $request, Employee $employee) {
        $validated = $request->validate([
            'name' => 'required|string',
            'speciality_id' => 'required|integer'
        ]);
        Employee::find($employee->id)->update($validated);
        return response()->json(['msg' => 'Employee updated successfully', 'Employee' => $employee], 201);
    }

    public function destroy(Employee $employee) {
        $employee->delete();
        return response()->json(['msg' => 'Employee deleted successfully'], 204);
    }
}
