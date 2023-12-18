<?php

namespace App\Http\Requests;

use App\Models\Program;
use Illuminate\Foundation\Http\FormRequest;

class ApplyRequest extends FormRequest
{
    protected $messages = [];
    protected $rules = [];

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
    public function rules()
    {

        // Get program and custom fields
        $program = Program::find($this->request->get('id'));
        $inputs = json_decode($program->custom_fields);

        // Initialize counters and arrays
        $selectListCounter = 0;
        $fileCounter = 0;
        $radioCounter = 0;
        $inputCounter = 0;

        foreach ($inputs as $key => $input) {
            switch ($input->type) {
                case 'checkbox-group':
                    if ($input->required) {
                        $this->rules["checkbox_{$selectListCounter}"] = 'required';
                        $this->messages["checkbox_{$selectListCounter}.required"] = "The {$input->label} field is required.";
                    }
                    $selectListCounter++;
                    break;
                case 'file':
                    if ($input->required) {
                        $this->rules["files.{$fileCounter}"] = 'required';
                        $this->messages["files.{$fileCounter}.required"] = "The {$input->label} field is required.";
                    }
                    $fileCounter++;
                    break;
                case 'radio-group':
                    if ($input->required) {
                        $this->rules["radio_{$radioCounter}"] = 'required';
                        $this->messages["radio_{$radioCounter}.required"] = "The {$input->label} field is required.";
                    }
                    $radioCounter++;
                    break;
                default:
                    if ($input->required) {
                        $this->rules["answer.{$inputCounter}"] = 'required';
                        $this->messages["answer.{$inputCounter}.required"] = "The {$input->label} field is required.";
                    }
                    $inputCounter++;
                    break;
            }
        }

        if (!$this->rules) {
            return [];
        }

        return $this->rules;
    }

    public function messages() {
        return $this->messages;
    }
}
