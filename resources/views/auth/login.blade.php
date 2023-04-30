<x-app-layout title="Login">
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <x-slot name="header">
            <h1 class="text-3xl font-bold">Masuk</h1>
            <p>Belum punya akun? <a href=" {{ route('register') }} " class="font-bold ">Daftar Sekarang!</a></p>
        </x-slot>
        
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input id="password" class="block w-full mt-1" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="flex justify-between mt-4">
                @if (Route::has('password.request'))
                <a class="text-sm" href="{{ route('password.request') }}">Lupa Password?</a>
                @endif

                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mt-4">
                <x-button class="block w-full font-bold bg-white hover:bg-gray-100 active:bg-gray-200">
                    Masuk
                </x-button>
            </div>
        </form>

        <!-- Social Login -->
        <x-auth-social-login />
    </x-auth-card>
</x-app-layout>