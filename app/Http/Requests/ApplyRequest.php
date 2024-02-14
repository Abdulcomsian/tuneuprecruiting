<?php

namespace App\Http\Requests;

use App\Models\Program;
use App\Models\RequestRequirement;
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
        $requirementId = $this->request->get('requirement_id');

        $inputs = $requirementId
            ? json_decode(RequestRequirement::find($requirementId)->custom_fields)
            : json_decode(Program::find($this->request->get('id'))->custom_fields);



        // Initialize counters and arrays
        $selectListCounter = 0;
        $fileCounter = 0;
        $radioCounter = 0;
        $inputCounter = 0;

        if (!empty($inputs)) {
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
                        // Extract labels and join them with commas
                        $option_labels = implode(", ", array_column($input->values, 'label'));

                        if ($input->required) {
                            $this->rules["radio_{$radioCounter}"] = 'required|in:'.$option_labels;
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
