<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'max:225'],
            'message' => ['max:225'],
            'phone' => ['required'],
            'email' => ['email', 'required', 'max:225'],
            'last_name' => ['required', 'max:225'],
            'floor' => ['max:12', 'required'],
            'street' => ['required', 'max:225'],
            'apartment' => ['max:12', 'required'],
        ];
    }
}
