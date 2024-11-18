<?php

namespace App\Http\Requests\Servicie;

use Illuminate\Foundation\Http\FormRequest;

class StoreServicieRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'duration' => 'required|integer',
            'typeServicie_id' => 'required|integer',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/'
        ];
    }
}
