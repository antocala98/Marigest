@extends('layouts.layoutAdminCorsi')
@section('breadc')
    <li>
        <div class="flex items-center">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <a href="{{url('corsi/22-nmrs/admin/schede-individuali')}}" class="inline-flex items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">Schede Individuali allievi</a>
        </div>
    </li>
@endsection
@section('body')
<div class="overflow-auto " id="myTabContent">
   <!-- Barra di ricerca -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="p-4">
            <label for="table-search" class="sr-only">Cerca</label>
            <div class="relative mt-1">

                <form action="{{url('corsi/22-nmrs/admin/schede-individuali')}}" method="POST" class="flex items-center">
                    @csrf
                    <label for="simple-search" class="sr-only">Cerca</label>
                    <div class="relative w-1/3">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        </div>

                        <input type="text" name="cerca" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cerca" >
                    </div>
                    <button type="submit" class="relative p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
                </form>


            </div>
        </div>

    <div class="p-4 pb-14 bg-gray-50 rounded-lg dark:bg-gray-800 " id="profile" role="tabpanel"
        aria-labelledby="profile-tab">
        <div id="accordion-collapse" data-accordion="collapse" class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full table-fixed pb-12 overflow-auto text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Cognome
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Sesso
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Matricola
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Categoria
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Download</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($allievi as $allievo)
                        <tr id="accordion-collapse" data-accordion="collapse" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{$allievo->cognome}}
                            </th>
                            <td class="px-6 py-4">
                                {{$allievo->nome}}
                            </td>
                            <td class="px-6 py-4">
                                {{$allievo->sesso}}
                            </td>
                            <td class="px-6 py-4">
                                {{$allievo->matricola_militare}}
                            </td>
                            <td class="px-6 py-4">
                                {{$allievo->categoria}}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('downloadScheda22NMRS', ['id' => $allievo->id ]) }} " class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Scarica PDF</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
