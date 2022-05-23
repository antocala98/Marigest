@extends('layouts.layoutAdminCorsi')
@section('breadc')
    <li>
        <div class="flex items-center">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            <a href="{{ url('corsi/22-nmrs/admin/sezione-disciplinare') }}"
                class="inline-flex items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">Sezione disciplinare</a>
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            &nbsp;
            <a href="{{ url('corsi/22-nmrs/admin/sezione-disciplinare/inserisci-provvedimento-disciplinare') }}"
                class="inline-flex items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">Inserisci provvedimento disciplinare</a>
        </div>
    </li>
@endsection
@section('body')
<form method="POST" action="#" enctype="multipart/form-data">
    @csrf
    <div class="mt-0 overflow-hidden flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <input hidden type="text" id="user_committente" name="user_committente" value="{{Auth::user()->id}}">
                <div class="mt-4">
                    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nome</label>
                    <input type="text" id="nome" name="nome"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                </div>
                <div>
                    <label for="cognome"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cognome</label>
                    <input type="text" id="cognome" name="cognome"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                </div>
                <div>
                    <label for="codice_fiscale"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Codice Fiscale</label>
                    <input type="text" id="codice_fiscale" name="codice_fiscale"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                </div>
            </div>
        <div class="flex justify-center mt-6">
            <x-button element="button" class="mb-32" type="submit">Inserisci</x-button>
            <div>
        </div>
        
</form>
  
@endsection
