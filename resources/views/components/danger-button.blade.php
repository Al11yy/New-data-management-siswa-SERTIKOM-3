<!-- Updated danger button for glassmorphism -->
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-danger px-6 py-2.5 rounded-xl text-sm font-medium']) }}>
    {{ $slot }}
</button>
