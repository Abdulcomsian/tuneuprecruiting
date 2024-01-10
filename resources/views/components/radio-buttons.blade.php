<!-- resources/views/components/radio-buttons.blade.php -->

@props(['name', 'options', 'selected' => null, 'label', 'id' => '', 'required' => false, 'inputLabel' => true])

@if($inputLabel)
    <x-input-label value="{{ $label }}" labelFor="{{ $id }}" required="{{ $required }}" />
@endif

@foreach($options as $value => $label)
    <input type="radio" name="{{ $name }}" {{ $label == $selected ? 'checked' : '' }} class="form-check-input" value="{{ $label }}" id="{{ $label }}">
    <label class="form-check-label" for="{{ $label }}">{{ $label }}</label>
@endforeach
