<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-dark btn-sm']) }}>
    {{ $slot }}
</button>