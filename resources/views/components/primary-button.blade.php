<!-- Updated primary button for glassmorphism -->
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-primary px-6 py-2.5 rounded-xl text-sm font-semibold']) }}>
    {{ $slot }}
</button>
