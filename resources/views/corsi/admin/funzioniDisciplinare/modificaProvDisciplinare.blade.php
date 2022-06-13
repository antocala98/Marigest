@extends('layouts.layoutAdminCorsi')
@section('breadc')
    <li>
        <div class="flex items-center">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            <a href="{{ url('corsi/marescialli/admin/sezione-disciplinare') }}"
                class="inline-flex items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">Sezione disciplinare</a>
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            &nbsp;
            <a href="{{ url('corsi/marescialli/admin/sezione-disciplinare/modifica-provvedimento-disciplinare') }}"
                class="inline-flex items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">Modifica provvedimento disciplinare</a>
        </div>
    </li>
@endsection
@section('body')
    <?php
    if(isset($provvedimentoDisciplinare)) { ?>
    <div class="p-4 pb-14 bg-gray-50 rounded-lg dark:bg-gray-800 " id="profile" role="tabpanel"
         aria-labelledby="profile-tab">
        <div id="accordion-collapse" data-accordion="collapse" class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full table-fixed pb-12 overflow-auto text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Matricola
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Provvedimento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Giorni
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Numero Protocollo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Data Provvedimento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Data Notifica
                    </th>
                </tr>
                </thead>
                <tbody class="">
                @foreach ($provvedimentoDisciplinare as $provvedimentoD)
                    <tr id="accordion-collapse" data-accordion="collapse" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{$provvedimentoD->matricola_allievo}}
                        </th>
                        <td class="px-6 py-4">
                            {{$provvedimentoD->tipo_provvedimento}}
                        </td>
                        <td class="px-6 py-4">
                            {{$provvedimentoD->num_giorni_provvedimento}}
                        </td>
                        <td class="px-6 py-4">
                            {{$provvedimentoD->num_protocollo}}
                        </td>
                        <td class="px-6 py-4">
                            {{$provvedimentoD->data_provvedimento}}
                        </td>
                        <td class="px-6 py-4">
                            {{$provvedimentoD->data_notifica}}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('modificaProvDAdmin', ['id' => $provvedimentoD->id]) }} "
                               class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifica
                                provvedimento</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <?php } else if(!isset($provvedimentoDisciplinare) && !isset($feedback_utente)){   ?>
    <form method="POST" action="{{ route('aggiornaProvDAdmin') }}" enctype="multipart/form-data">
         @csrf
        <div class="flex justify-center"
        <div class="m-11 grid gap-6 mb-24 lg:grid-cols-2">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <input hidden type="text"  id="id" name="id" value="{{ $provvedimentoD->id }}">

                <div class="mt-4 w-full">
                    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Matricola</label>
                    <input type="text" id="allievo" name="allievo_matricola"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           value="{{ $provvedimentoD->matricola_allievo}}"
                </div>
                        <x-auth-validation-errors class="ml-20" :errors="$errors" />
                        <div class="mt-4">
                            <label for="tipo_provvedimento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tipo provvedimento</label>
                            <select id="tipo_provvedimento" name="tipo_provvedimento" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="Rimprovero">Rimprovero</option>
                                <option value="Consegna Semplice">Consegna semplice</option>
                                <option value="Consegna Rigore">Consegna di rigore</option>
                                <option value="Elogio">Elogio</option>
                                <option value="TPS">T.P.S.</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <label for="num_giorni" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Numero giorni provvedimento</label>
                            <input disabled type="number" id="num_giorni" name="num_giorni" value="{{ $provvedimentoD->num_giorni_provvedimento }}" min="1" max="15" step="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        </div>
                        <div class="mt-4">
                            <label for="data_provvedimento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Data provvedimento</label>
                            <input type="date" id="data_provvedimento" name="data_provvedimento" value="{{ $provvedimentoD->data_provvedimento }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mt-4">
                            <label for="data_notifica" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Data di notifica</label>
                            <input type="date" id="data_notifica" name="data_notifica" value="{{ $provvedimentoD->data_notifica }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>


                        <div class="mt-4">
                            <label for="n_protocollo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Numero di protocollo</label>
                            <input type="text" id="n_protocollo" name="n_protocollo"  value="{{ $provvedimentoD->num_protocollo }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <label for="note_aggiutive" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Note aggiuntive</label>
                        <textarea name="note_aggiuntive" id="note_aggiuntive" form="form"></textarea>
                    </div>
                </div>
                <div class="flex justify-center mt-6">
                    <x-button element="button" class="mb-24" type="submit">Inserisci</x-button>
                </div>
    </form>
    <?php }else if(isset($feedback_utente)){  ?>
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
    <script>
        document.getElementById('tipo_provvedimento').onchange = function () {
            document.getElementById('num_giorni').setAttribute("disabled", "disabled");
            if (this.value == 'Consegna Semplice' || this.value == 'Consegna Rigore'){
                document.getElementById('num_giorni').removeAttribute("disabled");
            }
        };
    </script>
@endsection
