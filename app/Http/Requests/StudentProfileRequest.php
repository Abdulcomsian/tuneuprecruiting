<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class StudentProfileRequest extends FormRequest
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
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'preferred_name' => 'required|string',
            'home_phone_number' => 'required|string',
            'mobile_number' => 'required|string',
            'graduation_year' => 'required|string',
            'birth_date' => 'required|string',
            'are_u_from_usa' => 'required|string',
            'country' => 'required|string',
            'primary_address' => 'required|string',
            'guardians_name' => 'required|string',
            'guardians_phone_number' => 'required|string',
            'state' => 'required|string',
            'program_type' => 'required|string',
            'gender' => 'required|string',
        ];

        return $rules;
    }
}
