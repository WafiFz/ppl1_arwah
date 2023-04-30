<nav class="bg-white drop-shadow-md" x-data="{ showMobileNav: false }">
    <div class="px-2 py-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button @click="showMobileNav = !showMobileNav" type="button" class="inline-flex items-center justify-center p-2 text-gray-600 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">{{__('Open main menu')}}</span>
                    <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex items-center content-center justify-center flex-1 sm:items-stretch sm:justify-start">
                <div class="flex items-center flex-shrink-0">
                    <a href="/">
                        <img class="block w-auto h-10 lg:hidden" src="{{asset('img/logo-with-text.jpg')}}" alt="{{ app_name() }}">
                    </a>
                    <a href="/">
                        <img class="hidden w-auto h-12 lg:block" src="{{asset('img/logo-with-text-dark.png')}}" alt="{{ app_name() }}">
                    </a>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="{{ route('frontend.posts.index') }}" class="px-3 py-2 text-base font-medium text-gray-600 transition duration-300 ease-out border-b-2 border-transparent hover:border-orange-600">
                            {{__('Posts')}}
                        </a>
                        <a href="{{ route('frontend.categories.index') }}" class="px-3 py-2 text-base font-medium text-gray-600 transition duration-300 ease-out border-b-2 border-transparent hover:border-orange-600">
                            {{__('Categories')}}
                        </a>
                        <a href="{{ route('frontend.tags.index') }}" class="px-3 py-2 text-base font-medium text-gray-600 transition duration-300 ease-out border-b-2 border-transparent hover:border-orange-600">
                            {{__('Tags')}}
                        </a>
                        <a href="{{ route('frontend.comments.index') }}" class="px-3 py-2 text-base font-medium text-gray-600 transition duration-300 ease-out border-b-2 border-transparent hover:border-orange-600">
                            {{__('Comments')}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="relative ml-3" x-data="{ isUserMenuOpen: false }">
                    <div class="flex flex-row">
                        @guest
                        <a href="{{ route('login') }}" class="flex items-center invisible px-4 py-2 mx-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-orange-600 rounded-md hover:bg-orange-500 focus:outline-none focus:bg-orange-500 md:visible">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            <span class="mx-1">{{__('Login')}}</span>
                        </a>
                        @if(user_registration())
                        <a href="{{ route('register') }}" class="flex items-center invisible px-4 py-2 mx-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-orange-600 rounded-md hover:bg-orange-500 focus:outline-none focus:bg-orange-500 md:visible">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="mx-1">{{__('Register')}}</span>
                        </a>
                        @endif
                        @else
                        <button @click="isUserMenuOpen = !isUserMenuOpen" @keydown.escape="isUserMenuOpen = false" type="button" class="flex text-sm transition duration-300 ease-out bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-offset-cyan-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">{{__('Open main menu')}}</span>
                            <img class="w-10 h-10 border border-transparent rounded-full hover:border-cyan-600" src="{{asset(auth()->user()->avatar)}}" alt="{{asset(auth()->user()->name)}}">
                        </button>
                        @endguest
                    </div>

                    @auth
                    <div x-show="isUserMenuOpen" @click.away="isUserMenuOpen = false" x-transition:enter="transition ease-out duration-100 transform" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        @can('view_backend')
                        <a href='{{ route("backend.dashboard") }}' class="block px-4 py-2 text-sm text-gray-600 hover:bg-orange-600 hover:text-white" role="menuitem">
                            <i class="fas fa-tachometer-alt fa-fw"></i>&nbsp;{{__('Admin Dashboard')}}
                        </a>
                        @endif
                        <a href="{{ route('frontend.users.profile', encode_id(auth()->user()->id)) }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-orange-600 hover:text-white" role="menuitem">
                            <i class="fas fa-user fa-fw"></i>&nbsp;{{ Auth::user()->name }}
                        </a>
                        <a href="{{ route('frontend.users.profileEdit', encode_id(auth()->user()->id)) }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-orange-600 hover:text-white" role="menuitem">
                            <i class="fas fa-cogs fa-fw"></i>&nbsp;{{__('Settings')}}
                        </a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-600 hover:bg-orange-600 hover:text-white" role="menuitem">
                            {{__('Logout')}}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="absolute z-10 w-full p-1 sm:hidden" id="mobile-menu" x-show="showMobileNav" @click.away="showMobileNav = false" x-transition:enter="transition ease-out duration-100 transform" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
            <a href="{{ route('frontend.posts.index') }}" class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md">
                {{__('Posts')}}
            </a>
            <a href="{{ route('frontend.categories.index') }}" class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md">
                {{__('Categories')}}
            </a>
            <a href="{{ route('frontend.tags.index') }}" class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md">
                {{__('Tags')}}
            </a>
            <a href="{{ route('frontend.comments.index') }}" class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md">
                {{__('Comments')}}
            </a>

            @can('view_backend')
            <a href='{{ route("backend.dashboard") }}' class="block px-3 py-2 text-base font-medium text-gray-500 border rounded-md" role="menuitem">
                <i class="fas fa-tachometer-alt fa-fw"></i>&nbsp;{{__('Admin Dashboard')}}
            </a>
            @endif


            @guest
            <hr>
            <a href="{{ route('login') }}" class="block px-3 py-2 mt-2 text-base font-medium text-gray-500 rounded-md bg-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                <span class="mx-1">{{__('Login')}}</span>
            </a>
            @if(user_registration())
            <a href="{{ route('register') }}" class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md bg-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="mx-1">{{__('Create an account')}}</span>
            </a>
            @endif
            @endauth
        </div>
    </div>
</nav>