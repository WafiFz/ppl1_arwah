<div class=" xl:container flex py-3 text-gray-700 bg-white border-b border-gray-300">
    <div x-show="!isOpen()" class="flex">
        <a
            x-show="!isOpen()"
            @click.prevent="handleOpen()"
            class="p-3 hover:text-brand-purple-500"
            href="#"
        >
            <svg
                class="w-6 h-6"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                />
            </svg>
        </a>
    </div>
    <div
        class="p-3 text-xl font-bold grow"
    >
        {{ $title }}
    </div>
</div>