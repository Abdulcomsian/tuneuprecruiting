@props([
    'name',
    'id' => '',
    'className' => 'bw-textarea',
    'value' => '',
    'disable' => false,
    'style' => '',
    'required' => false,
    'label'
    ])

<x-input-label value="{{ $label }}" required="{{ $required }}" labelFor="{{ $id }}" />
<textarea class="{{ $className }}" id="{{ $id }}" name="{{ $name }}" {{ $required ? 'required' : '' }}>{{ $value }}</textarea>
