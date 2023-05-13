<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        {{-- <link rel="icon" type="image/png" href="{{asset('img/logo.svg')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/logo.svg')}}"> --}}
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ setting('meta_description') }}">
        <meta name="keyword" content="{{ setting('meta_keyword') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} | {{ $title }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @stack('before-styles')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
        @stack('after-styles')
        
        <!-- Analytics -->
        <x-google-analytics config="{{ setting('google_analytics') }}" />

        <!-- Payment Midtrans -->
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-col min-h-screen bg-[#FCFCFC]">
            @include('layouts._navigation')

            <!-- Page Content -->
            <main class="flex-grow mt-20">
                {{ $slot }}
            </main>

            @include('layouts._footer')
        </div>
        <!-- Scripts -->
        <script src="{{ mix('js/frontend.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>
        
        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/b249d00227.js" crossorigin="anonymous"></script>
        @stack('after-javascript')
    </body>
</html>
