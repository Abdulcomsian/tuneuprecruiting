<!-- resources/views/components/select.blade.php -->

@props([
    'options',
    'selected' => null,
    'name',
    'id',
    'selectClass' => 'bw-raw-select',
    'required' => false,
    'label',
    'labelName' => 'name',
    'valueName' => 'name',
    'inputLabel' => true
    ])

@if($inputLabel)
    <x-input-label value="{{ $label }}" labelFor="{{ $id }}" required="{{ $required }}" />
@endif

<select name="{{ $name }}" id="{{ $id }}" {{ $attributes->merge(['class' => $selectClass]) }} {{ $required ? 'required' : '' }}>
    <option value="">Select an option</option>
    @foreach($options as $value => $label)
        <option value="{{ $label->$valueName }}" {{ $label->$valueName == $selected ? 'selected' : '' }}>
            {{ $label->$labelName }}
        </option>
    @endforeach
</select>
