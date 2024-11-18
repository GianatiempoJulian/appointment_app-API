<?php

namespace App\Http\Requests\Status;
use Illuminate\Foundation\Http\FormRequest;

class StoreStatusRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description' => 'required|string'
        ];
    }
}
