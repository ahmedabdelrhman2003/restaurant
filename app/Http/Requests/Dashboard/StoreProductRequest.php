<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'max:225'],
            'image' => ['required', 'file', 'mimes:jpg,png,jpeg,svg,webp', 'max:1000'],
            'description' => ['required', 'min:10', 'max:225'],
            'price' => ['required', 'numeric']
        ];
    }
}
