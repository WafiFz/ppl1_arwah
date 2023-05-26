<x-app-layout title="{{ $title }}">
    <section class="py-6">
        <div class="container text-justify">
            <h1 class="mb-4 text-4xl text-center">{{ $title }}</h1>
            {{ $slot }}
        </div>
    </section>
</x-app-layout>