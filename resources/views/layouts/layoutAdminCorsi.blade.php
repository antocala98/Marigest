<x-app-layout>
    <x-slot name="header">
        <div class="bg-gray-900">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 ml-3">
                    <li class="inline-flex items-center">
                        <a href="{{ url('corsi/marescialli/admin/home') }}"
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
        <div class="pl-4  w-full max-w-8xl">
            <div class="lg:flex">
                <aside id="sidebar"
                    class="hidden fixed flex-none w-72 h-full lg:static lg:h-screen lg:overflow-y-auto lg:pt-0 lg:w-60 lg:block lg:border-r-2">
                    <div id="navWrapper"
                        class="overflow-hidden overflow-y-auto z-20  bg-white scrolling-touch max-w-2xs lg:h-5/6 lg:block lg:sticky top:0 lg:top-0 dark:bg-gray-900 lg:mr-0">
                        <nav id="nav"
                            class="mt-0 pt-0 top-0 px-1 pl-3 lg:pl-0  overflow-y-auto font-medium text-base lg:text-sm   "
                            aria-label="Docs navigation">
                            <ul class="mb-0 ">
                                <li >
                                    <!--<a href="{{ url('corsi/marescialli/admin/home') }}"
                                        class="mb-2 text-sm font-semibold tracking-wide text-gray-900 uppercase lg:text-xs dark:text-white">
                                        <br>HOME</h5> </a>-->
                                    <ul >
                                        <li class="border-b-2 pb-3">
                                                <button  href={{ url('corsi/marescialli/admin/sezione-disciplinare/') }} data-collapse-toggle="dropdownDisciplinare" type="button" 
                                                class=" py-0 transition-colors duration-200 relative block hover:text-gray-900 font-semibold tracking-wide text-gray-500 dark:text-gray-400 dark:hover:text-white "><br>SEZIONE
                                                    DISCIPLINARE
                                                </button>
                                                <div id="dropdownDisciplinare" class=" hidden " >
                                                    <ul >
                                                    
                                                        <li><a  href="{{ url('corsi/marescialli/admin/sezione-disciplinare/inserisci-provvedimento-disciplinare') }}"
                                                            class="indent-1 py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500 dark:text-gray-400 dark:hover:text-white "> Inserisci
                                                            provvedimento disciplinare</a></li>
                                                        <li><a  href="{{ url('corsi/marescialli/admin/sezione-disciplinare/modifica-provvedimento-disciplinare') }}"
                                                                class="  py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500 dark:text-gray-400 dark:hover:text-white ">Modifica
                                                                provvedimento disciplinare</a></li>
                                                        <li><a  href="{{ url('corsi/marescialli/admin/sezione-disciplinare/visualizza-provvedimento-disciplinare') }}"
                                                                class=" py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500 dark:text-gray-400 dark:hover:text-white ">Visualizza
                                                                provvedimento disciplinare</a></li>
                                                    </ul>
                                                </div>
                                            
                                        </li>
                                        <br>
                                        <li class="border-b-2 pb-3">
                                            <button href="{{ url('corsi/marescialli/admin/sezione-sanitaria') }}" data-collapse-toggle="dropdownSanitaria"
                                                class="py-2 transition-colors duration-200 relative block  hover:text-gray-900 font-semibold tracking-wide text-gray-500 dark:text-gray-400 dark:hover:text-white "
                                                aria-current="page">SEZIONE SANITARIA</button>
                                            <div class="hidden " id="dropdownSanitaria">
                                                <ul>
                                                    <li><a href="{{ url('corsi/marescialli/admin/sezione-sanitaria/inserisci-provvedimento-sanitario') }}"
                                                            class="py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500 dark:text-gray-400 dark:hover:text-white ">Inserisci
                                                            provvedimento sanitario</a></li>
                                                    <li><a href="{{ url('corsi/marescialli/admin/sezione-sanitaria/modifica-provvedimento-sanitario') }}"
                                                            class="py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500 dark:text-gray-400 dark:hover:text-white ">Modifica
                                                            provvedimento sanitario</a></li>
                                                    <li><a href="{{ url('corsi/marescialli/admin/sezione-sanitaria/visualizza-provvedimento-sanitario') }}"
                                                            class="py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500 dark:text-gray-400 dark:hover:text-white ">Visualizza
                                                            provvedimento sanitario</a></li>
                                                </ul>
                                            </div>
                                            
                                        </li>
                                        <br>
                                        <li class="border-b-2 pb-3">
                                            <button href="{{ url('corsi/marescialli/admin/sezione-studi') }}" data-collapse-toggle="dropdownStudi"
                                                class="py-2 transition-colors duration-200 relative block hover:text-gray-900 font-semibold tracking-wide text-gray-500 dark:text-gray-400 dark:hover:text-white ">SEZIONE
                                                STUDI</button>
                                                <div class="hidden " id="dropdownStudi">
                                                    <ul>
                                                        <li><a href="{{ url('corsi/marescialli/admin/sezione-studi/inserisci-verbali-esami')}}" class="py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500 dark:text-gray-400 dark:hover:text-white ">Verbali esami</a></li>
                                                    </ul>
                                                </div>
                                        </li>
                                        <br>
                                        <li class="border-b-2 pb-3">
                                            <button href="{{ url('corsi/marescialli/admin/sezione-sportiva') }}" data-collapse-toggle="dropdownSportiva"
                                                class="py-2 transition-colors duration-200 relative block hover:text-gray-900 font-semibold tracking-wide text-gray-500 dark:text-gray-400 dark:hover:text-white ">SEZIONE
                                                SPORTIVA
                                            </button>
                                            <div class="hidden" id="dropdownSportiva">
                                                <ul>
                                                    <li><a href="{{ url('corsi/marescialli/admin/sezione-sportiva/inserisci-verbali-sportivi')}}" class="py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500 dark:text-gray-400 dark:hover:text-white ">Verbali sportivi</a></li>
                                                </ul>
                                            </div>
                                            
                                        </li>
                                </li>
                                <li class="border-b-2 pb-3 pt-2">
                                    <a href="{{ url('corsi/marescialli/admin/gestione-personale-corsi') }}"
                                        class="mb-2   hover:text-gray-900 font-semibold tracking-wide text-gray-500 dark:text-white">
                                        <br>GESTIONE PERSONALE</h5> </a>
                                </li>
                                <li class="border-b-2 pb-3">
                                    <a href="{{ url('corsi/marescialli/admin/aggiungi-dati-corsi') }}"
                                        class="mb-2  hover:text-gray-900 font-semibold tracking-wide text-gray-500 dark:text-white">
                                        <br>ACQUISISCI DATI INCORPORAMENTO</h5> </a>
                                </li>
                                <li class="border-b-2 pb-3">
                                    <a href="{{ url('corsi/marescialli/admin/schede-individuali') }}"
                                        class="mb-2  hover:text-gray-900 font-semibold tracking-wide text-gray-500 dark:text-white">
                                        <br>SCHEDE INDIVIDUALI ALLIEVI</h5> </a>
                                </li>
                                <li class="border-b-2 pb-3">
                                    <button href="{{ url('corsi/marescialli/admin/schede-riepilogative') }}" data-collapse-toggle="dropdownSchedeRiepilogative"
                                        class="mb-2 hover:text-gray-900 font-semibold tracking-wide text-gray-500 dark:text-white">
                                        <br>SCHEDE RIEPILOGATIVE</h5>
                                    </button>

                                        <div class="hidden" id="dropdownSchedeRiepilogative">
                                            <ul>
                                                <li>
                                                    <a href="{{ url('corsi/marescialli/admin/schede-riepilogative/Relazione-fine-incorporamento') }}"
                                                        class="py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500 dark:text-gray-400 dark:hover:text-white ">
                                                        Relazione di fine incorporamento</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500 dark:text-gray-400 dark:hover:text-white ">
                                                        Informazioni anagrafiche</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500 dark:text-gray-400 dark:hover:text-white ">
                                                        Situazione disciplinare</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500 dark:text-gray-400 dark:hover:text-white ">
                                                        Schede sanitarie</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500 dark:text-gray-400 dark:hover:text-white ">
                                                        Carriera universitaria</a>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                </li>
                                <li class="border-b-2 pb-3">
                                    <a href="{{ url('corsi/marescialli/admin/modifica-dati-allievi') }}"
                                        class="mb-2 hover:text-gray-900 font-semibold tracking-wide text-gray-500 dark:text-white">
                                        <br>MODIFICA DATI ALLIEVI</h5> </a>
                                </li>
                                
                        </nav>
                    </div>
                </aside>
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
                <a href="{{ url('corsi/marescialli/admin/gestione-personale-corsi') }}"
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    aria-selected="true">Gestione Personale</a>
            </li>
            <li class="mr-2" role="presentation">
                <a href="{{ url('corsi/marescialli/admin/aggiungi-dati-corsi') }}"
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    aria-selected="false">Acquisisci dati incorporamento</a>
            </li>
            <li class="mr-2" role="presentation">
                <a href="{{ url('corsi/marescialli/admin/schede-individuali') }}"
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    aria-selected="false">Schede individuali allievi</a>
            </li>
            <li role="presentation">
                <a href="{{ url('corsi/marescialli/admin/schede-riepilogative') }}"
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    aria-selected="false">Schede Riepilogative</a>
            </li>
            <li role="presentation">
                <a href="{{ url('corsi/marescialli/admin/modifica-dati-allievi') }}"
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    aria-selected="false">Modifica dati Allievi</a>
            </li>
        </ul>
    </div>

    @yield('body')


</x-app-layout>
