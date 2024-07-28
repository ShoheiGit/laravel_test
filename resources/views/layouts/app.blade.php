<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        @stack('styles')
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/sidebar.css') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <!-- Scripts -->
        <!-- jQuery読み込み -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <!-- スクリプトの読み込み -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])
        <script src="{{ asset('/js/main.js') }}"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            
            <!-- Page Content -->
            <main class="flex">
                @include('components.sidebar')
                {{ $slot }}
            </main>
        </div>
        
    </body>
</html>
