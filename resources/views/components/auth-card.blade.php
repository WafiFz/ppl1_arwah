@props(["extra"=>""])

<div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
    <div class="w-full px-6 py-4 mt-6 overflow-hidden shadow-md bg-brand-purple-100 sm:max-w-md sm:rounded-lg">
        <div class="mb-5 text-center">
            {{ $header ?? '' }}
        </div>
        {{ $slot }}
    </div>
    {{ $slot }}
</div>