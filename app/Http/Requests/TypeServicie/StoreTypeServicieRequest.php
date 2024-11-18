<?php

namespace App\Http\Requests\TypeServicie;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeServicieRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
           'name' => 'required|string'
        ];
    }
}
