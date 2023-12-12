<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class ProgramRequest extends FormRequest
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
        $this->request->add(['coach_id' => Session::get('coachId')]);
        $rules = [
            'program_name' => 'required|string',
            'number_of_students' => 'required|integer', // Changed type to integer
            'session' => 'required|string',
            'details' => 'string',
            'custom_fields' => 'string',
            'status' => 'string',
        ];

        return $rules;
    }
}
