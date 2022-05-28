@extends('layouts.layoutAdminCorsi')
@section('breadc')
    <li>
        <div class="flex items-center">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <a href="{{url('corsi/marescialli/admin/sezione-studi')}}" class="inline-flex items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">Sezione Studi</a>
        </div>
    </li>
    <li>
        <div class="flex items-center">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <a href="{{url('corsi/marescialli/admin/sezione-studi/inserisci-verbali-esami')}}" class="inline-flex items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">Verbali Esami</a>
        </div>
    </li>
@endsection
@section('body')
<?php if(isset($feedback_utente)){ ?>
    <div class="block">
        <div id="toast-success"
        class="flex items-center w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
        role="alert">
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
        </div>
        <div class="ml-3 text-sm font-normal"><?php echo $feedback_utente; ?></div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
            data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    
<?php } ?>
    <form method="POST" action="{{url('corsi/marescialli/admin/sezione-studi/inserisci-verbali-esami')}}" id="form" enctype="multipart/form-data">
        @csrf
        <div class=" block md:flex md:justify-center">
            <div class="w-full md:w-2/6  sm:mx-1 mt-12 px-6 py-2 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <x-auth-validation-errors class="ml-2" :errors="$errors" />
                <!--<div class="mt-4">
                    <label for="tipo_provvedimento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tipo provvedimento</label>
                    <select id="tipo_provvedimento" name="tipo_provvedimento" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="Rimprovero">Rimprovero</option>
                        <option value="Consegna Semplice">Consegna semplice</option>
                        <option value="Consegna Rigore">Consegna di rigore</option>
                        <option value="Elogio">Elogio</option>
                        <option value="TPS">T.P.S.</option>
                    </select>
                </div>-->
                <div class="mt-4">
                    <label for="materie" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Codice Materia</label>
                    <input list="materie" type="text" name="materie" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mt-4">
                    <label for="cod_verb" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Protocollo Verbale</label>
                    <input type="number" id="codiceVerbale" name="codiceVerbale" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                </div>
                
                <div class="mt-4">
                    <label for="data_verbale" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Data Verbale</label>
                    <input type="date" id="dataVerbale" name="dataVerbale" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="w-full md:w-2/6 sm:mx-1 mt-12 px-6 py-2 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="mt-4">
                    <label for="allievo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Allievo</label>
                    <input list="allievi" type="text" id="allievo" name="allievo" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mt-4">
                    <label for="voto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Voto</label>
                    <input type="text" id="voto" name="voto" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mt-4">
                    <label for="ufficiale" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ufficiale di commissione</label>
                    <input list="ufficiale" type="text" id="ufficiale" name="ufficiale" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="hidden">
                    <input type="id" name="idUserRedattore" value="{{$userRedattore->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
        </div>
            <div class="flex justify-center mt-6">
                <x-button element="button" class="mb-24" type="submit">Inserisci</x-button>
            </div>
    
    </form>
    <datalist id="materie">
        @foreach ($materie as $materia)
            <option value="{{$materia->codice}}">{{$materia->nome}}-{{$materia->facolta}}-{{$materia->codice}}</option>
        @endforeach
    </datalist>
    <datalist id="allievi">
        @foreach ($allievi as $allievo)
            <option value="{{$allievo->matricola_militare}}">{{$allievo->cognome}} {{$allievo->nome}}-{{$allievo->matricola_militare}}</option>
        @endforeach
    </datalist>
      ?>
    
@endsection