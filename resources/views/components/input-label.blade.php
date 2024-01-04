@props(['value', 'labelFor', 'required' => false])

<label for="{{ $labelFor }}" {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }} @if($required) <span class="text-danger">*</span> @endif
</label>
