<html>
    <head>
        <link href="/css/app.css" rel="stylesheet">
        <script src="../js/menu.js"></script>
        <title>Marigest - @yield('title')</title>
    </head>

    <body>
            <nav class="bg-gray-900">
                <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                    <div class="relative flex items-center justify-between h-16">
                        <!-- Responsive menu icon -->
                        <div class="md:hidden flex items-center">
                            <button class="outline-none mobile-menu-button">
                                <svg class=" w-6 h-6 text-gray-500 hover:text-purple "
                                    x-show="!showMenu"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- LOGO -->
                        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                            <div class="flex-shrink-0 flex items-center">
                                <img class="block lg:hidden h-12 w-auto" src="../img/LOGO marigest.png" alt="Workflow">
                                <img class="hidden lg:block h-12 w-auto" src="../img/LOGO marigest.png" alt="Workflow">
                            </div>
                            <!-- Primary Navbar items -->
                            <div class=" hidden sm:block sm:ml-6">
                                <div class="flex space-x-4">
                                    @yield('componentiNavbar')
                                </div> 
                            </div>
                        </div>

                        <!-- Profile dropdown -->
                        <button type="button" class="text-white hover:text-white border-2 border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                        focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center mr-2 dark:border-blue-500 dark:text-blue-500
                        dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">Login</button>

                        <!-- Dropdown menu -->
                        <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profilo</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Impostazioni</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
                <!-- Mobile menu, show/hide based on menu state. -->
                <div class="sm:hidden mobile-menu bg-gray-900 ">
                    <ul class="">
                        @yield('componentiDropdown')
                    </ul>
                </div>

                <script>
                    const btn = document.querySelector("button.mobile-menu-button");
                    const menu = document.querySelector(".mobile-menu");

                    btn.addEventListener("click", () => {
                        menu.classList.toggle("hidden");
                    });
                </script>
        </nav>

        <div class="relative overflow-hidden bg-no-repeat bg-cover h-500 max-h-fit" style="
    background-position: 90%;
    background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/146.webp');
    ">

    <div class="relative top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
         style="background-color: rgba(0, 0, 0, 0.75)">
        <div class="flex justify-center items-center h-full">
            <div class="text-center text-white px-6 md:px-12">
                <h1 class="text-5xl font-bold mt-0 mb-6">GESTIONE PERSONALE MARINA</h1>
               <!-- <button type="button"
                        class="inline-block px-6 py-2.5 border-2 border-white text-white font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                        data-mdb-ripple="true" data-mdb-ripple-color="light">
                    ENTRA
                </button> -->
            </div>
        </div>
    </div>
        <footer class="p-4 w-full shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 absolute bottom-0 bg-gray-900 ">
            <span class="text-sm text-white sm:text-center">© 2022 <a href="https://flowbite.com" class="hover:underline">Flowbite™</a>. All Rights Reserved.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm text-white dark:text-white sm:mt-0">
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
    </footer>

    </body>
</html>