@extends('layouts.layoutAdminCorsi')
@section('body')
    <div id="myTabContent" >
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            <div id="accordion-collapse" data-accordion="collapse" class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full table-fixed text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cognome
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tipo di utente
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr id="accordion-collapse" data-accordion="collapse" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{$user->nome}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$user->cognome}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$user->tipo_utente}}
                                </td>
                                <td>
                                    <h2  id="accordion-collapse-heading-{{$user->id}}">
                                        <button type="button" class=" flex items-center p-2 font-medium text-left text-gray-500 rounded-t-xl border border-b-0 border-gray-200 focus:ring-4 focus:ring-green-100 focus:bg-green-100 dark:focus:ring-green-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-{{$user->id}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{$user->id}}">
                                          <span>Gestione permessi</span>
                                        </button>
                                    </h2>
                                </td>
                            </tr>
                            <tr id="accordion-collapse-body-{{$user->id}}" class="hidden bg-green-100" aria-labelledby="accordion-collapse-heading-{{$user->id}}">
                                <td>
                                    <label class="pl-5" for="description">Scegli quale permesso concedere a {{$user->cognome}}</label>
                                </td>
                                <td class="pl-4">
                                    <form class="inline-flex">                                               
                                        <input type="text" id="tipo_permesso" value="{{$user->nome}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Addetto" required>
                                        <div class="hidden">
                                            <!-- assegno in input lo useer->id -->
                                            <input type="hidden" id="id" value="{{$user->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{$user->id}}" required>
                                            </div>
                                        <div>
                                            <td class="pl-6">
                                                <button type="submit" class=" pl-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Concedi Permessi</button>
                                            </td>
                                    </form>
                                    <form >
                                        <input type="text" id="id" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{$user->id}}" required>
                                        <td class="">
                                            <button type="submit" value="{{$user->id}}" class="pl-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancella Utente</button>
                                        </td>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>  
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection