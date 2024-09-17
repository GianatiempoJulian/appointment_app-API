<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index() {
        $appointments = Appointment::with(['customer','employee','servicie'])->get();
        return response()->json($appointments);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'customer_id' => 'required|integer',
            'employee_id' => 'required|integer',
            'service_id' => 'required|integer',
            'date_time' => 'required|string',
            'status' => 'required|string'
        ]);
        $appointment = Appointment::create($validated);
        return response()->json(['msg' => 'Appointment created successfully', 'Appointment' => $appointment], 201);
    }

    public function show(Appointment $appointment) {
        $appointmentFinded = Appointment::with(['customer', 'employee', 'servicie'])->find($appointment->id);
        if($appointmentFinded){
            return response()->json(['Appointment' => $appointmentFinded]); 
        }else{
            return response()->json(['msg' => 'Appointment not found'],404); 
        }
    }

    public function update(Request $request, Appointment $appointment) {
        $validated = $request->validate([
           'customer_id' => 'required|integer',
            'employee_id' => 'required|integer',
            'service_id' => 'required|integer',
            'date_time' => 'required|string',
            'status' => 'required|string'
        ]);
        Appointment::find($appointment->id)->update($validated);
        return response()->json(['msg' => 'Appointment updated successfully', 'Appointment' => $appointment], 201);
    }

    public function destroy(Appointment $appointment) {
        $appointment->delete();
        return response()->json(['msg' => 'Appointment deleted successfully'], 204);
    }
}
