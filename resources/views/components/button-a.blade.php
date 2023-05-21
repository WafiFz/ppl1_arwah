@props(['disabled' => false])

<a {{ $attributes->merge(['class' => 'inline-flex items-center justify-center px-4 py-2 rounded-md font-semibold text-xs tracking-widest transition ease-in-out duration-150'.($disabled?' opacity-50 cursor-default':'')]) }}>
    {{ $slot }}
</a>