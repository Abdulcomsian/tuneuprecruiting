@props(['customFields'])

@php $checkboxCounter = 0; @endphp
@php $inputCounter = 0; @endphp
@php $radioCounter = 0; @endphp
@php $multiSelectListCounter = 0; @endphp
@if(!empty($customFields))
    <div class="row">
        @foreach($customFields as $key => $field)
            @if($field->type !== 'file' && $field->type !== 'checkbox-group' && $field->type !== 'radio-group')
                @if($field->type == 'select' && $field->multiple)

                @else
                    <input type="hidden" name="label[]" value="{{ $field->label }}">
                    <input type="hidden" name="type[]" value="{{ $field->type }}">
                @endif
            @endif
            @php $required = ($field->required) ? 'required' : ''; @endphp
            @php $requiredLabel = ($field->required) ? "<span class='text-danger'>*</span>" : ''; @endphp
            <div class="col-md-4 mt-3">
                @if($field->type == 'select')
                    @php $variableName = 'answer[]'; @endphp
                    @if($field->multiple)
                        @php
                            $variableName = 'checkbox_' . $checkboxCounter . '[]';
                            $checkboxCounter++;
                        @endphp
                        <input type="hidden" name="checkbox_labels[]" value="{{ $field->label }}">
                        <input type="hidden" name="checkbox_types[]" value="{{ $field->type }}">
                    @endif
                    @php $checkForMultiple = ($field->multiple) ? 'multiple' : ''; @endphp
                    @component('components.select-type-of-object-array', [
                        'name' => $variableName,
                        'options' => $field->values,
                        'selected' => old($variableName, $field->answer ?? ''),
                        'label' => $field->label,
                        'id' => $variableName,
                        'required' => $required,
                        'keyName' => 'label',
                        'labelName' => 'label',
                        'valueName' => 'label'
                        ])
                    @endcomponent
                @elseif($field->type == 'file')
                    <input type="hidden" name="file_label[]" value="{{ $field->label }}">
                    <input type="hidden" name="file_type[]" value="{{ $field->type }}">
                    <x-dynamic-input
                        name="files[]"
                        type="file"
                        placeholder="{{ $field->label }}"
                        required="{{ isset($field->answer) ? '' : $required }}"
                        value="{{ $field->answer ?? '' }}"
                        accept="image/*,video/*" />
                @elseif($field->type == 'radio-group')
                    <input type="hidden" name="radio_label[]" value="{{ $field->label }}">
                    <x-input-label value="{{ $field->label }}" required="{{ $required }}" labelFor="" />
                    @foreach($field->values as $radioKey => $value)
                        <input type="hidden" name="radio_counter" value="{{ $radioCounter }}">
                        <input
                            type="radio"
                            class="form-check-input"
                            id="radio-{{ $key }}-{{ $radioKey }}"
                            name="radio_{{ $radioCounter }}"
                            {{ $required }}
                            {{ (isset($field->answer) && $value->label == $field->answer) ? 'checked' : '' }}
                            value="{{ $value->label ?? '' }}">
                        <label class="form-check-label" for="radio-{{ $key }}-{{ $radioKey }}">{{ $value->label }}</label>
                    @endforeach
                    @php $radioCounter++ @endphp
                @elseif($field->type == 'checkbox-group')
                    <input type="hidden" name="checkbox_labels[]" value="{{ $field->label }}">
                    <input type="hidden" name="checkbox_types[]" value="{{ $field->type }}">
                    <div class="form-group checkbox-group">
                        <x-input-label value="{{ $field->label }}" required="{{ $required }}" labelFor="" />
                        @foreach($field->values as $checkboxKey => $value)
                            @php $options = isset($field->answer) ? json_decode($field->answer) : [] @endphp
                            <input
                                type="checkbox"
                                id="checkbox-{{$key}}-{{ $checkboxKey }}"
                                class="form-check-input"
                                value="{{ $value->label }}"
                                name="checkbox_{{ $checkboxCounter }}[]"
                                {{ in_array($value->label, old('checkbox_'.$checkboxCounter, $options)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="checkbox-{{$key}}-{{ $checkboxKey }}">{{ $value->label }}</label>
                        @endforeach
                    </div>
                    @php $checkboxCounter++; @endphp
                @else
                    @php $min = (isset($field->min)) ? "min=".$field->min : "min=0"; @endphp
                    @php $max = (isset($field->max)) ? "max=".$field->max : "max=0"; @endphp
                    @php $placeholder = (isset($field->placeholder)) ? "placeholder=".$field->placeholder : "placeholder=".$field->label; @endphp
                    @php $maxLength = (isset($field->maxlength)) ? "maxlength=".$field->maxlength : "maxlength="; @endphp
                    @if($field->type == 'textarea')
                        <x-input-textarea
                            name="answer[]"
                            label="{{ $field->label }}"
                            required="{{ (isset($field->required)) ? true : false }}"
                            id="{{ str_replace(' ', '-', $field->label) }}"
                            value="{{ old('answer.'.$inputCounter, $field->answer ?? '') }}" />
                    @else
                        <x-dynamic-input
                            type="{{ $field->type }}"
                            name="answer[]"
                            value="{{ old('answer.'.$inputCounter, $field->answer ?? '') }}"
                            placeholder="{{ $field->label }}"
                            id="{{ str_replace(' ', '-', $field->label) }}"
                            min="{{ (isset($field->min)) ? $field->min : false }}"
                            max="{{ (isset($field->max)) ? $field->max : false }}"
                            maxlength="{{ (isset($field->maxlength)) ? $field->maxlength : false }}"
                            required="{{ (isset($field->$required)) ? true : false }}" />
                    @endif
                    @php $inputCounter++; @endphp
                @endif
            </div>
        @endforeach
    </div>
@endif
