<?php

namespace App\Http\Requests\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'customer_id' => 'required|integer',
            'employee_id' => 'required|integer',
            'service_id' => 'required|integer',
            'status_id' => 'required|integer',
            'place_id' => 'required|integer',
            'date' => 'required',
            'time' => 'required'
        ];
    }
}
