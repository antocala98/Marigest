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

<body class="y">
    <div class="min-h-screen items-center">
        @include('layouts.navigation')
        {{ $header }}

        
        <div class="hidden fixed inset-0 z-10 bg-gray-900/50 dark:bg-gray-900/60" id="sidebarBackdrop"></div>
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

    </div>


    </div>
    @include('layouts.footer')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/prism.min.js"
        integrity="sha512-axJX7DJduStuBB8ePC8ryGzacZPr3rdLaIDZitiEgWWk2gsXxEFlm4UW0iNzj2h3wp5mOylgHAzBzM4nRSvTZA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://flowbite.com/docs/flowbite.js?v=1.4.7a"></script>
    <script src="https://flowbite.com/docs/datepicker.js?v=1.4.7a"></script>
    <script src="https://flowbite.com/docs/docs.js?v=1.4.7a"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
        integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
        data-cf-beacon='{"rayId":"711e7d651815374c","version":"2021.12.0","r":1,"token":"24622d6e111e4e3cbe7d800f5abbd87c","si":100}'
        crossorigin="anonymous"></script>
    </div>

</body>

</html>
