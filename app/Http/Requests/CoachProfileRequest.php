<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoachProfileRequest extends FormRequest
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
            'about_me' => 'nullable|string',
            'bio' => 'nullable|string',
            'website' => 'nullable|url',
        ];

        // Add password rule if provided
        if (!empty($this->request->get('password'))) {
            $rules['password'] = 'required|min:8|confirmed';
        }

        return $rules;
    }
}
