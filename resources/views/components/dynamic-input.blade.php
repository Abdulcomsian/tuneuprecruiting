<!-- resources/views/components/dynamic-input.blade.php -->
@props([
    'type',
    'placeholder' => '',
    'name',
    'id' => '',
    'class' => 'bw-input',
    'value' => '',
    'disable' => false,
    'style' => '',
    'accept' => '',
    'required' => false,
    'min' => false,
    'max' => false,
    'maxLength' => false,
    'inputLabel' => true,
    ])
@if($inputLabel)
    <x-input-label value="{{ $placeholder }}" labelFor="{{ $id }}" required="{{ $required }}" />
@endif

<input
    type="{{ $type }}"
    value="{{ $value }}"
    style="{{ $style }} {{ $type == 'file' ? 'padding: 0.8rem' : '' }}"
    placeholder="{{ $placeholder }}"
    {{ $required ? 'required' : '' }}
    {{ $disable ? 'disabled' : '' }}
    name="{{ $name }}"
    @if($min) min="{{ $min }}" @endif
    @if($max) max="{{ $max }}" @endif
    @if($maxLength) maxlength="{{ $maxLength }}" @endif
    @if($id) id="{{ $id }}" @endif
    @if($type == 'file') accept="{{ $accept }}" @endif
    @if($class)class="{{ $class }}" @endif>
