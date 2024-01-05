@props(['value'])

<label {{ $attributes->merge(['class' => 'capitalize block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
