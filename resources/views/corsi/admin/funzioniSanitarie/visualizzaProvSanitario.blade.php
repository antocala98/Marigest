@extends('layouts.layoutAdminCorsi')
@section('breadc')
    <li>
        <div class="flex items-center">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"></path>
            </svg>
            <a href="{{ url('corsi/22-nmrs/admin/sezione-sanitaria') }}"
               class="inline-flex items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">Sezione sanitaria</a>
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"></path>
            </svg>
            &nbsp;
            <a href="{{ url('corsi/22-nmrs/admin/sezione-sanitaria/visualizza-provvedimento-sanitario') }}"
               class="inline-flex items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">Inserisci provvedimento sanitario</a>
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
                        Data Inizio
                    </th>
                </tr>
                </thead>
                <tbody class="">

                @foreach ($provvedimentiSanitari as $provvedimento)
                    <tr id="accordion-collapse" data-accordion="collapse" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{$provvedimento->matricola_allievo_paziente}}
                        </th>
                        <td class="px-6 py-4">
                            {{$provvedimento->tipo_provvedimento}}
                        </td>
                        <td class="px-6 py-4">
                            {{$provvedimento->num_giorni_provvedimento}}
                        </td>
                        <td class="px-6 py-4">
                            {{$provvedimento->data_provvedimento}}
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
