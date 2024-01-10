@props(['value', 'labelFor', 'required' => false, 'className' => ''])

<label for="{{ $labelFor }}" {{ $attributes->merge(['class' => $className . ' block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }} @if($required) <span class="text-danger">*</span> @endif
</label>
