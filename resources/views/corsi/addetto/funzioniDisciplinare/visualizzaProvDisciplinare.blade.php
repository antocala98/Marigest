@extends('layouts.layoutAddettoCorsi')
@section('breadc')
    <li>
        <div class="flex items-center">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            <a href="{{ url('corsi/marescialli/addetto/sezione-disciplinare') }}"
                class="inline-flex items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">Sezione disciplinare</a>
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            &nbsp;
            <a href="{{ url('corsi/marescialli/addetto/sezione-disciplinare/visualizza-provvedimento-disciplinare') }}"
                class="inline-flex items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">Visualizza provvedimento disciplinare</a>
        </div>
    </li>
@endsection
@section('body')

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
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
