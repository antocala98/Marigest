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
<form method="POST" action="#" id="form" enctype="multipart/form-data">
    @csrf
    <div class="m-11 grid gap-6 mb-24 lg:grid-cols-2">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <input hidden type="text" id="user_commit" name="use_commit" value="{{ Auth::user()->id }}">
            <div class="mt-4">
                <label for="tipo_provvedimento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tipo provvedimento</label>
                <select id="tipo_provvedimento" name="tipo_provvedimento" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="rimprovero">Rimprovero</option>
                    <option value="consegna_semplice">Consegna semplice</option>
                    <option value="consegna_rigore">Consegna di rigore</option>
                    <option value="elogio">Elogio</option>
                    <option value="tps">T.P.S.</option>
                </select>
            </div>
            <div class="mt-4">
                <label for="num_giorni" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Numero giorni provvedimento</label>
                <input disabled type="number" id="num_giorni" name="num_giorni" min="1" max="15" step="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
            </div>
            <div class="mt-4">
                <label for="data_provvedimento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Data provvedimento</label>
                <input type="date" id="data_provvedimento" name="data_provvedimento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mt-4">
                <label for="data_notifica" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Data di notifica</label>
                <input type="date" id="data_notifica" name="data_notifica" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </div>

        <div class="w-full pl-6 sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="mt-4">
                <label for="matricola_allievo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Matricola allievo</label>
                <input type="text" id="matricola_allievo" name="matricola_allievo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mt-4">
                <label for="n_protocollo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Numero di protocollo</label>
                <input type="text" id="n_protocollo" name="n_protocollo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <label for="note_aggiutive" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Note aggiuntive</label>
            <textarea name="note_aggiuntive" id="note_aggiuntive" form="form"></textarea>  
        </div>
    </div>
        <div class="flex justify-center">
            <x-button element="button" class="mb-24" type="submit">Inserisci</x-button>
            
        </div>
        
</form>
<script>
    document.getElementById("tipo_provvedimento").onchange = function () {
        document.getElementById("num_giorni").setAttribute("disabled", "disabled");
        if (this.value == 'consegna_semplice' || this.value == 'consegna_rigore'){
            document.getElementById("num_giorni").removeAttribute("disabled");
        }
    };
</script> 
@endsection

 
