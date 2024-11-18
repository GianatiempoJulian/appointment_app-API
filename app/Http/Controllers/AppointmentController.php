<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Customer;
use App\Http\Requests\Appointment\StoreAppointmentRequest;
use App\Http\Requests\Appointment\UpdateAppointmentRequest;


class AppointmentController extends Controller
{
    public function index() {
        $appointments = Appointment::with(['customer','employee','servicie.typeServicie','place', 'status'])->get();
        return response()->json($appointments);
    }

    public function store(StoreAppointmentRequest $request) {
        $appointment = Appointment::create($request->validated());
        return response()->json(['msg' => 'Appointment created successfully', 'Appointment' => $appointment], 201);
    }

    public function show(Appointment $appointment) {
        $appointmentFinded = Appointment::with(['customer', 'employee', 'servicie.typeServicie', 'place'])->find($appointment->id);
        return $appointmentFinded ? response()->json(['Appointment' => $appointmentFinded]) : response()->json(['msg' => 'Appointment not found'], 404);
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment) {
        Appointment::find($appointment->id)->update($request->validated());
        return response()->json(['msg' => 'Appointment updated successfully', 'Appointment' => $appointment], 200);
    }

    public function destroy(Appointment $appointment) {
        $appointment->delete();
        return response()->json(['msg' => 'Appointment deleted successfully'], 204);
    }

    public function getAppointmentsFromCustomer($customerId) {
        $customer = Customer::find($customerId);
        $appointmentsFromCustomer = $customer->appointments()->with(['customer', 'employee', 'servicie.typeServicie', 'place', 'status'])->get();
        return $appointmentsFromCustomer ? response()->json(['appointmentsFromCustomer' => $appointmentsFromCustomer], 200) : response()->json(['msg' => 'Appointments from customer not found'], 404);
    }

    public function getAvailables(){
        $availables = Appointment::with(['customer','employee','servicie.typeServicie','place', 'status'])->where('status_id', 1)->get();
        return $availables ? response()->json(['availables' => $availables], 200) : response()->json(['msg' => 'Availables not found'], 404);
    }
}
