@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-darak text-black']) }}>
    {{ $value ?? $slot }}
</label>
