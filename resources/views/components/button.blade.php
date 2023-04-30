@props(['disabled' => false])

<button {{ $attributes->class(['font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none', 'opacity-50 cursor-default' => $disabled]) }}>
    {{ $slot }}
</button>