@props(['disabled' => false])

<button {{$attributes->merge(['class' => 'font-medium rounded-md text-center text-sm px-5 py-2.5 focus:outline-none'.($disabled?' opacity-50 cursor-default':'')]) }}>
    {{ $slot }}
</button>