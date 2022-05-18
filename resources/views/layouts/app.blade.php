<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script src="../../../node_modules/flowbite/dist/flowbite.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Marigest 1.0') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('img/LOGO-Maripers.ico') }}" type="image/png" />
        
    </head>
    <body class="font-sans antialiased h-14 bg-gradient-to-r bg-white overflow-auto">
        <div class="min-h-screen items-center">
            @include('layouts.navigation')

            <!-- Page Heading -->
            {{ $header }}
            
            

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
    @include('layouts.footer')
</html>
