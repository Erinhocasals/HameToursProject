<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-warning btn-sm']) }}>
    {{ $slot }}
</button>
