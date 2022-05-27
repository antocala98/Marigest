<x-app-layout>
    <x-slot name="header">
        <div class="bg-gray-900">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 ml-3">
                    <li class="inline-flex items-center">
                        <a href="{{url('corsi/marescialli/admin/home')}}"
                        class="inline-flex items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">
                        <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Home
                        </a>
                    </li>
                    @yield('breadc')
                </ol>
            </nav>
        </div>
    </x-slot>

    <!--<x-button class="justify-center" element="button" data-mdb-toggle="sidenav" data-mdb-target="#sidenav-1" class="btn btn-primary"
        aria-controls="#sidenav-1" aria-haspopup="true">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg> 
    </x-button> -->
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent"
            role="tablist">
            <li class="mr-2" role="presentation">
                <a href="{{url('corsi/marescialli/admin/gestione-personale-corsi')}}"
                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    aria-selected="true">Gestione Personale</a>
            </li>
            <li class="mr-2" role="presentation">
                <a href="{{url('corsi/marescialli/admin/aggiungi-dati-corsi')}}"
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    aria-selected="false">Acquisisci dati incorporamento</a>
            </li>
            <li class="mr-2" role="presentation">
                <a href="{{url('corsi/marescialli/admin/schede-individuali')}}"
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    aria-selected="false">Schede individuali allievi</a>
            </li>
            <li role="presentation">
                <a href="{{url('corsi/marescialli/admin/schede-riepilogative')}}"
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    aria-selected="false">Schede Riepilogative</a>
            </li>
            <li role="presentation">
                <a href="{{url('corsi/marescialli/admin/modifica-dati-allievi')}}"
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    aria-selected="false">Modifica dati Allievi</a>
            </li>
        </ul>
    </div>

    @yield('body')


</x-app-layout>
