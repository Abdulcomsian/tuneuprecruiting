<!-- resources/views/components/select.blade.php -->

@props(['options', 'selected' => null, 'name', 'id'])

<select name="{{ $name }}" id="{{ $id }}" {{ $attributes->merge(['class' => 'form-control']) }}>
    <option value="">Select an option</option>
    @foreach($options as $value => $label)
        <option value="{{ $label->name }}" {{ $label->name == $selected ? 'selected' : '' }}>
            {{ $label->name }}
        </option>
    @endforeach
</select>
