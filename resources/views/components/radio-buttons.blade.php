<!-- resources/views/components/radio-buttons.blade.php -->

@props(['name', 'options', 'selected' => null, 'label', 'id' => '', 'required' => false])

<x-input-label value="{{ $label }}" labelFor="{{ $id }}" required="{{ $required }}" />
@foreach($options as $value => $label)
    <input type="radio" name="{{ $name }}" {{ $label == $selected ? 'checked' : '' }} class="form-check-input" value="{{ $label }}" id="{{ $label }}">
    <label class="form-check-label" for="{{ $label }}">{{ $label }}</label>
@endforeach
