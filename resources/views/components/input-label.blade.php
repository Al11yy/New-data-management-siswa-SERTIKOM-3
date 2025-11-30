<!-- Updated input label for glassmorphism -->
@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-white/70 text-sm font-medium mb-2']) }}>
    {{ $value ?? $slot }}
</label>
