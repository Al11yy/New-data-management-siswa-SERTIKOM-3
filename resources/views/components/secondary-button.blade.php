<!-- Updated secondary button for glassmorphism -->
<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn-secondary px-6 py-2.5 rounded-xl text-sm font-medium']) }}>
    {{ $slot }}
</button>
