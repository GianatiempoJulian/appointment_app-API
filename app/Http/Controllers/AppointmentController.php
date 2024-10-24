<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Customer;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index() {
        $appointments = Appointment::with(['customer','employee','servicie.typeServicie','place', 'status'])->get();
        return response()->json($appointments);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'customer_id' => 'required|integer',
            'employee_id' => 'required|integer',
            'service_id' => 'required|integer',
            'status_id' => 'required|integer',
            'place_id' => 'required|integer',
            'date' => 'required',
            'time' => 'required'
        ]);
        $appointment = Appointment::create($validated);
        return response()->json(['msg' => 'Appointment created successfully', 'Appointment' => $appointment], 201);
    }

    public function show(Appointment $appointment) {
        $appointmentFinded = Appointment::with(['customer', 'employee', 'servicie.typeServicie', 'place'])->find($appointment->id);
        if($appointmentFinded){
            return response()->json(['Appointment' => $appointmentFinded]); 
        }else{
            return response()->json(['msg' => 'Appointment not found'],404); 
        }
    }

    public function update(Request $request, Appointment $appointment) {
        $validated = $request->validate([
            'employee_id' => 'integer|nullable',
            'service_id' => 'integer|nullable',
            'status_id' => 'integer|nullable',
            'place_id' => 'integer|nullable',
            'customer_id' => 'integer|nullable',  
        ]);
        Appointment::find($appointment->id)->update($validated);
        return response()->json(['msg' => 'Appointment updated successfully', 'Appointment' => $appointment], 200);
    }

    public function destroy(Appointment $appointment) {
        $appointment->delete();
        return response()->json(['msg' => 'Appointment deleted successfully'], 204);
    }

    public function getAppointmentsFromCustomer($customerId) {
        $customer = Customer::find($customerId);
        $appointmentsFromCustomer = $customer->appointments()->with(['customer', 'employee', 'servicie.typeServicie', 'place', 'status'])->get();
        if($appointmentsFromCustomer){
            return response()->json(['appointmentsFromCustomer' => $appointmentsFromCustomer], 200); 
        }else{
            return response()->json(['msg' => 'Appointments from customer not found'],404); 
        }
    }

    public function getAvailables(){
        $availables = Appointment::with(['customer','employee','servicie.typeServicie','place', 'status'])->where('status_id', 1)->get();
        if($availables){
            return response()->json(['available' => $availables], 200);
        }else{
            return response()->json(['msg' => 'Availables not found'], 404);
        }
    }
}
