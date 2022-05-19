<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-center text-sm leading-tight">
            <div class="bg-gray-900">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3 ml-3">
                      <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-sm font-medium hover:text-blue-600 text-white dark:text-white dark:hover:text-white">
                          Benvenuto
                        </a>
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
        height: 628px;
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
