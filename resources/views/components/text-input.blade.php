<!-- Updated text input for glassmorphism -->
@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full glass-input rounded-xl text-black p-3.5 text-sm placeholder:text-black/50']) }}>
