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
        <div class="flex overflow-auto">
            <div class="overflow-scroll">
                <nav id="nav" class="lg:text-sm lg:leading-6 relative">
                    <div class="sticky top-0 -ml-0.5 pointer-events-none">
                        <div class="h-10 bg-white dark:bg-slate-900"></div>
                        <div class="bg-white dark:bg-slate-900 relative pointer-events-auto"><button type="button"
                                class="hidden w-full lg:flex items-center text-sm leading-6 text-slate-400 rounded-md ring-1 ring-slate-900/10 shadow-sm py-1.5 pl-2 pr-3 hover:ring-slate-300 dark:bg-slate-800 dark:highlight-white/5 dark:hover:bg-slate-700"><svg
                                    width="24" height="24" fill="none" aria-hidden="true" class="mr-3 flex-none">
                                    <path d="m19 19-3.5-3.5" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <circle cx="11" cy="11" r="6" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"></circle>
                                </svg>Quick search...</button></div>
                        <div class="h-8 bg-gradient-to-b from-white dark:from-slate-900"></div>
                    </div>
                    <ul>
                        <li><a href="/docs/installation"
                                class="group flex items-center lg:text-sm lg:leading-6 mb-4 font-semibold text-sky-500 dark:text-sky-400">
                                <div
                                    class="mr-4 rounded-md ring-1 ring-slate-900/5 shadow-sm group-hover:shadow group-hover:ring-slate-900/10 dark:ring-0 dark:shadow-none dark:group-hover:shadow-none dark:group-hover:highlight-white/10 group-hover:shadow-sky-200 dark:group-hover:bg-sky-500 dark:bg-sky-500 dark:highlight-white/10">
                                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.5 7c1.093 0 2.117.27 3 .743V17a6.345 6.345 0 0 0-3-.743c-1.093 0-2.617.27-3.5.743V7.743C5.883 7.27 7.407 7 8.5 7Z"
                                            class="fill-sky-200 group-hover:fill-sky-500 dark:fill-sky-300 dark:group-hover:fill-sky-300">
                                        </path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.5 7c1.093 0 2.617.27 3.5.743V17c-.883-.473-2.407-.743-3.5-.743s-2.117.27-3 .743V7.743a6.344 6.344 0 0 1 3-.743Z"
                                            class="fill-sky-400 group-hover:fill-sky-500 dark:fill-sky-200 dark:group-hover:fill-sky-200">
                                        </path>
                                    </svg>
                                </div>Documentation
                            </a></li>
                        
                </nav>
            </div>
            <div class="overflow-hidden">
                <!-- Page Heading -->
                {{ $header }}



                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>

    </div>
    @include('layouts.footer')

</body>

</html>
