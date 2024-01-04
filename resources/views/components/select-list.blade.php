<!-- resources/views/components/select.blade.php -->

@props(['options', 'selected' => null, 'name', 'id', 'inputClass' => 'bw-raw-select', 'arrayKey' => true, 'required' => false, 'label'])

<x-input-label value="{{ $label }}" labelFor="{{ $id }}" required="{{ $required }}" />
<select name="{{ $name }}" id="{{ $id }}" {{ $attributes->merge(['class' => $inputClass]) }} {{ $required ? 'required' : '' }}>
    <option value="">Select an option</option>
    @foreach($options as $value => $label)
        @php $keyValue = ($arrayKey) ? $value : $label @endphp
        <option value="{{ ($arrayKey) ? $value : $label }}" {{ $keyValue == $selected ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>
