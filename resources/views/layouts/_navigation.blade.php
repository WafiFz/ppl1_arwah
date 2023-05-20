<nav id="main-nav" class="absolute top-0 left-0 right-0 z-50 drop-shadow-md" x-data="{ showMobileNav: false }">
    <div id="nav-light" class="container py-2 mx-auto">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button @click="showMobileNav = !showMobileNav" type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-brand-purple-500 hover:text-white hover:bg-brand-purple-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">{{ __('Open main menu') }}</span>
                    <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex items-center content-center justify-center flex-1 sm:items-stretch sm:justify-between">
                <div class="flex items-center flex-shrink-0">
                    <a href="{{ route('home') }}" class="block lg:hidden">
                        <img class="w-auto h-10 " src="{{ asset('img/logo-dark.svg') }}" alt="{{ app_name() }}">
                    </a>
                    <a href="{{ route('home') }}" class="hidden lg:block">
                        <img class="w-auto h-8 " src="{{ asset('img/logo-with-text-dark.svg') }}"
                            alt="{{ app_name() }}">
                    </a>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="{{ route('frontend.posts.index') }}"
                            class="px-3 py-2 text-base font-medium text-gray-600 transition duration-300 ease-out border-b-2 border-transparent hover:border-brand-purple-500">
                            Pricing
                        </a>
                        <a href="{{ route('frontend.categories.index') }}"
                            class="px-3 py-2 text-base font-medium text-gray-600 transition duration-300 ease-out border-b-2 border-transparent hover:border-brand-purple-500">
                            Portfolio
                        </a>
                        <a href="{{ route('frontend.tags.index') }}"
                            class="px-3 py-2 text-base font-medium text-gray-600 transition duration-300 ease-out border-b-2 border-transparent hover:border-brand-purple-500">
                            Partnership
                        </a>
                        <a href="{{ route('frontend.comments.index') }}"
                            class="px-3 py-2 text-base font-medium text-gray-600 transition duration-300 ease-out border-b-2 border-transparent hover:border-brand-purple-500">
                            About Us
                        </a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="relative ml-3" x-data="{ isUserMenuOpen: false }">
                    <div class="flex flex-row gap-1">
                        <x-button-a href="{{ route('order.index') }}"
                            class="invisible px-6 tracking-wide text-white capitalize transition-colors duration-200 transform !rounded-full bg-brand-purple-500 hover:bg-brand-yellow-500 hover:text-black md:visible">
                            <span class="mx-1">Pesan Sekarang</span>
                        </x-button-a>
                        @guest
                            <x-button-a href="{{ route('login') }}"
                                class="invisible px-6 ml-1 tracking-wide capitalize transition-colors duration-200 transform bg-white !rounded-full ring-1 ring-black hover:ring-0 text-brand-purple-500 hover:text-black hover:bg-brand-yellow-500 md:visible">
                                <span class="mx-1">{{ __('Login') }}</span>
                            </x-button-a>
                        @else
                            <button @click="isUserMenuOpen = !isUserMenuOpen" @keydown.escape="isUserMenuOpen = false"
                                type="button"
                                class="flex ml-1 text-sm transition duration-300 ease-out bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-offset-cyan-800 focus:ring-white"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">{{ __('Open main menu') }}</span>
                                <img class="w-10 h-10 border border-transparent rounded-full hover:border-cyan-600"
                                    src="{{ asset(auth()->user()->avatar) }}" alt="{{ asset(auth()->user()->name) }}">
                            </button>
                        @endguest
                    </div>

                    @auth
                        <div x-show="isUserMenuOpen" @click.away="isUserMenuOpen = false"
                            x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            @can('view_backend')
                                <a href='{{ route('backend.dashboard') }}'
                                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-brand-purple-500 hover:text-white"
                                    role="menuitem">
                                    <i class="fas fa-tachometer-alt fa-fw"></i>&nbsp;{{ __('Admin Dashboard') }}
                                </a>
                                @endif
                                <a href="{{ route('client.orders') }}"
                                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-brand-purple-500 hover:text-white"
                                    role="menuitem">
                                    <i class="fas fa-user fa-fw"></i>&nbsp;Client Area
                                </a>
                                {{-- <a href="{{ route('frontend.users.profile', encode_id(auth()->user()->id)) }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-brand-purple-500 hover:text-white" role="menuitem">
                            <i class="fas fa-user fa-fw"></i>&nbsp;{{ Auth::user()->name }}
                        </a> --}}
                                {{-- <a href="{{ route('frontend.users.profileEdit', encode_id(auth()->user()->id)) }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-brand-purple-500 hover:text-white" role="menuitem">
                            <i class="fas fa-cogs fa-fw"></i>&nbsp;{{__('Settings')}}
                        </a> --}}
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-brand-purple-500 hover:text-white"
                                    role="menuitem">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;{{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <div id="nav-dark" class="container hidden py-2 mx-auto">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button @click="showMobileNav = !showMobileNav" type="button"
                        class="inline-flex items-center justify-center p-2 text-white rounded-md hover:text-brand- purple hover:bg-brand-yellow-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">{{ __('Open main menu') }}</span>
                        <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex items-center content-center justify-center flex-1 sm:items-stretch sm:justify-between">
                    <div class="flex items-center flex-shrink-0">
                        <a href="/" class="block lg:hidden">
                            <img class="w-auto h-10 " src="{{ asset('img/logo-light.svg') }}"
                                alt="{{ app_name() }}">
                        </a>
                        <a href="/" class="hidden lg:block">
                            <img class="w-auto h-8 " src="{{ asset('img/logo-with-text-light.svg') }}"
                                alt="{{ app_name() }}">
                        </a>
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('frontend.posts.index') }}" class="nav-link">
                                Pricing
                            </a>
                            <a href="{{ route('frontend.categories.index') }}" class="nav-link">
                                Portfolio
                            </a>
                            <a href="{{ route('frontend.tags.index') }}" class="nav-link">
                                Partnership
                            </a>
                            <a href="{{ route('frontend.comments.index') }}" class="nav-link">
                                About Us
                            </a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3" x-data="{ isUserMenuOpen: false }">
                        <div class="flex flex-row">
                            <x-button-a href="{{ route('order.index') }}"
                                class="invisible px-6 tracking-wide capitalize transition-colors duration-200 transform bg-white !rounded-full text-brand-purple-500 hover:bg-brand-yellow-500 hover:text-black md:visible">
                                <span class="mx-1">Pesan Sekarang</span>
                            </x-button-a>
                            @guest
                                <x-button-a href="{{ route('login') }}"
                                    class="invisible px-6 ml-1 tracking-wide text-white capitalize transition-colors duration-200 transform !rounded-full bg-brand-purple-500 ring-1 ring-white hover:ring-0 hover:text-black hover:bg-brand-yellow-500 md:visible">
                                    <span class="mx-1">{{ __('Login') }}</span>
                                </x-button-a>
                            @else
                                <button @click="isUserMenuOpen = !isUserMenuOpen" @keydown.escape="isUserMenuOpen = false"
                                    type="button"
                                    class="flex ml-1 text-sm transition duration-300 ease-out bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-offset-cyan-800 focus:ring-white"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">{{ __('Open main menu') }}</span>
                                    <img class="w-10 h-10 border border-transparent rounded-full hover:border-cyan-600"
                                        src="{{ asset(auth()->user()->avatar) }}" alt="{{ asset(auth()->user()->name) }}">
                                </button>
                            @endguest
                        </div>

                        @auth
                            <div x-show="isUserMenuOpen" @click.away="isUserMenuOpen = false"
                                x-transition:enter="transition ease-out duration-100 transform"
                                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75 transform"
                                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">

                                @can('view_backend')
                                    <a href='{{ route('backend.dashboard') }}'
                                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-brand-purple-500 hover:text-white"
                                        role="menuitem">
                                        <i class="fas fa-tachometer-alt fa-fw"></i>&nbsp;{{ __('Admin Dashboard') }}
                                    </a>
                                    @endif
                                    <a href="{{ route('client.orders') }}"
                                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-brand-purple-500 hover:text-white"
                                        role="menuitem">
                                        <i class="fas fa-user fa-fw"></i>&nbsp;Client Area
                                    </a>
                                    {{-- <a href="{{ route('frontend.users.profile', encode_id(auth()->user()->id)) }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-brand-purple-500 hover:text-white" role="menuitem">
                            <i class="fas fa-user fa-fw"></i>&nbsp;{{ Auth::user()->name }}
                        </a> --}}
                                    {{-- <a href="{{ route('frontend.users.profileEdit', encode_id(auth()->user()->id)) }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-brand-purple-500 hover:text-white" role="menuitem">
                            <i class="fas fa-cogs fa-fw"></i>&nbsp;{{__('Settings')}}
                        </a> --}}
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-brand-purple-500 hover:text-white"
                                        role="menuitem">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="absolute z-10 w-full p-1 sm:hidden" id="mobile-menu" x-show="showMobileNav"
                @click.away="showMobileNav = false" x-transition:enter="transition ease-out duration-100 transform"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                    <a href="{{ route('frontend.posts.index') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md">
                        {{ __('Posts') }}
                    </a>
                    <a href="{{ route('frontend.categories.index') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md">
                        {{ __('Categories') }}
                    </a>
                    <a href="{{ route('frontend.tags.index') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md">
                        {{ __('Tags') }}
                    </a>
                    <a href="{{ route('frontend.comments.index') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md">
                        {{ __('Comments') }}
                    </a>

                    @can('view_backend')
                        <a href='{{ route('backend.dashboard') }}'
                            class="block px-3 py-2 text-base font-medium text-gray-500 border rounded-md" role="menuitem">
                            <i class="fas fa-tachometer-alt fa-fw"></i>&nbsp;{{ __('Admin Dashboard') }}
                        </a>
                        @endif

                        @guest
                            <hr>
                            <a href="{{ route('login') }}"
                                class="block px-3 py-2 mt-2 text-base font-medium rounded-md text-brand-purple-500 bg-brand-purple-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                <span class="mx-1">{{ __('Login') }}</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </nav>

            @push('after-javascript')
                <script>
                    const mainNav = document.getElementById("main-nav");
                    const navLight = document.getElementById("nav-light");
                    const navDark = document.getElementById("nav-dark");

                    document.addEventListener("scroll", () => {
                        if (window.pageYOffset > 0) {
                            navDark.classList.add("block");
                            navDark.classList.remove("hidden");

                            navLight.classList.add("hidden");
                            navLight.classList.remove("block");

                            mainNav.classList.add('bg-brand-purple-500', 'fixed');
                            mainNav.classList.remove('absolute');
                        } else {
                            navDark.classList.add("hidden");
                            navDark.classList.remove("block");

                            navLight.classList.add("block");
                            navLight.classList.remove("hidden");

                            mainNav.classList.add('absolute');
                            mainNav.classList.remove('bg-brand-purple-500', 'fixed');
                        }
                    });
                </script>
            @endpush
