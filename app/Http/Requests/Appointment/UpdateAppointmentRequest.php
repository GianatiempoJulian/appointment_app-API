<?php

namespace App\Http\Requests\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'employee_id' => 'integer|nullable',
            'service_id' => 'integer|nullable',
            'status_id' => 'integer|nullable',
            'place_id' => 'integer|nullable',
            'customer_id' => 'integer|nullable'
        ];
    }
}
