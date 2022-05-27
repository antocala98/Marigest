@extends('layouts.layoutAdminCorsi')
@section('breadc')
    <li>
        <div class="flex items-center">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <a href="{{url('corsi/marescialli/admin/gestione-personale-corsi')}}" class="inline-flex items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">Gestione Personale</a>
        </div>
    </li>
@endsection
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
                                    <form method="POST" action="{{url('corsi/marescialli/admin/gestione-personale-corsi')}}" class="inline-flex">
                                        @csrf                                               
                                        <select name="permessi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Addetto" required>>
                                            <option value="1">Admin</option>
                                            <option value="2">Admin Junior</option>
                                            <option value="3">Addetto</option>                                            
                                        </select>
                                        <div class="hidden">
                                            <!-- assegno in input lo useer->id -->
                                            <input type="number" name="id_personale_gestito_da_admin" value="{{$user->id}}">
                                        </div>
                                        <div>
                                            <td class="pl-6">
                                                <button type="submit" name="submit" value="gestionePermessi" class=" pl-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Concedi Permessi</button>
                                            </td>
                                            <td class="">
                                                <button type="submit" name="submit" value="elimina" class="pl-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancella Utente</button>
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
