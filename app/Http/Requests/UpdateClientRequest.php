<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'client_name' => ['required'],
            'client_email' => [
                'required',
                'email',
                Rule::unique('clients', 'client_email')->ignore($this->client)
            ],
            'client_phone_number' => ['required', 'numeric'],
            'company_name' => ['required'],
            'company_address' => ['required'],
            'company_city' => ['required'],
            'company_zip' => ['required'],
            'company_vat' => ['required'],
        ];
    }
}
