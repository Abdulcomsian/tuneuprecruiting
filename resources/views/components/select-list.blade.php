<!-- resources/views/components/select.blade.php -->

@props(['options', 'selected' => null, 'name', 'id', 'inputClass' => 'form-control', 'arrayKey' => true])

<select name="{{ $name }}" id="{{ $id }}" {{ $attributes->merge(['class' => $inputClass]) }}>
    <option value="">Select an option</option>
    @foreach($options as $value => $label)
        @php $keyValue = ($arrayKey) ? $value : $label @endphp
        <option value="{{ ($arrayKey) ? $value : $label }}" {{ $keyValue == $selected ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>
