<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Store extends FormRequest
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
        'store_name' => 'required|string|max:255|unique:stores,name',
    ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'store_name.required' => 'The store name is required.',
            'store_name.string' => 'The store name must be a valid string.',
            'store_name.max' => 'The store name must not exceed 255 characters.',
            'store_name.unique' => 'You already have a store with this name.',
        ];
    }
}
