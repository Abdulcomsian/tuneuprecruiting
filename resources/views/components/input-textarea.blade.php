@props([
    'name',
    'id' => '',
    'className' => 'bw-textarea',
    'value' => '',
    'disable' => false,
    'style' => '',
    'required' => false,
    'label',
    'inputLabel' => true
    ])

@if($inputLabel)
    <x-input-label value="{{ $label }}" required="{{ $required }}" labelFor="{{ $id }}" />
@endif

<textarea class="{{ $className }}" id="{{ $id }}" name="{{ $name }}" {{ $required ? 'required' : '' }}>{{ $value }}</textarea>
