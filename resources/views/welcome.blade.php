<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-center text-sm leading-tight">
            <div class="bg-gray-900">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                      <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-sm font-medium hover:text-blue-600 text-white dark:text-white dark:hover:text-white">
                          <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                          Home
                        </a>
                      </li>
                      <li>
                        <div class="flex items-center">
                          <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                          <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
                        </div>
                      </li>
                      <li aria-current="page">
                        <div class="flex items-center">
                          <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                          <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Flowbite</span>
                        </div>
                      </li>
                    </ol>
                  </nav>
            </div>
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="relative overflow-hidden bg-no-repeat bg-cover" style="
        background-position: 100%;
        background-image: url('../img/sfondo2.png');
        height: 650px;
        ">

            <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed">
                <div class="flex justify-center items-center h-full">
                    <div class="text-center text-white px-6 md:px-12">
                        <h1 class="text-5xl font-bold mt-0 mb-6" role="region" aria-label="MARIGEST">MARIGEST</h1>
                        <h3>La piattaforma per la gestione delle scuole della Marina Militare Italiana</h3>
                <!-- <button type="button"
                            class="inline-block px-6 py-2.5 border-2 border-white text-white font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                            data-mdb-ripple="true" data-mdb-ripple-color="light">
                        ENTRA
                    </button>-->
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>
