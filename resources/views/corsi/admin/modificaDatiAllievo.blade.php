@extends('layouts.layoutAdminCorsi')
@section('breadc')
    <li>
        <div class="flex items-center">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            <a href="{{ url('corsi/22-nmrs/admin/modifica-dati-allievi') }}"
                class="inline-flex items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">Schede
                Individuali allievi</a>
        </div>
    </li>
@endsection
@section('body')
    <?php if(isset($allievi)) { ?>
    <div id="myTabContent">
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div id="accordion-collapse" data-accordion="collapse" class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full table-fixed text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Cognome
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Matricola
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Modifica dati</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allievi as $allievo)
                            <tr id="accordion-collapse" data-accordion="collapse"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $allievo->cognome }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $allievo->nome }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $allievo->matricola_militare }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('modificaDati22NMRS', ['id' => $allievo->id]) }} "
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifica
                                        dati</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php } else {   ?>
    <form>
        <div class="grid gap-6 mb-6 lg:grid-cols-2">
            <div>
                <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nome</label>
                <input type="text" id="nome" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{$allievo->nome}}" required="">
            </div>
            <div>
                <label for="cognome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cognome</label>
                <input type="text" id="cognome"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{$allievo->cognome}}" required="">
            </div>
            <div>
                <label for="codice_fiscale" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Codice Fiscale</label>
                <input type="text" id="codice_fiscale"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{$allievo->codice_fiscale}}" required="">
            </div>
            <div>
                <label for="matricola_militare" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Matricola Militare</label>
                <input type="text" id="matricola_militare"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{$allievo->matricola_militare}}" required="">
            </div>
            <div>
                <label for="matricola_universitaria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Matricola Universitaria</label>
                <input type="text" id="matricola_universitaria"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{$allievo->matricola_universitaria}}" required="">
            </div>
            <div>
                <label for="luogo_nascita" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Luogo di nascita</label>
                <input type="text" id="luogo_nascita"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{$allievo->luogo_nascita}}" required="">
            </div>
            <div>
                <label for="provincia_nascita" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Provincia di nascita</label>
                <input type="text" id="provincia_nascita"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{$allievo->provincia_nascita}}" required="">
            </div>
            <div>
                <label for="nazione_nascita" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nazione di nascita</label>
                <input type="text" id="nazione_nascita"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{$allievo->nazione_nascita}}" required="">
            </div>
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email address</label>
            <input type="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="john.doe@company.com" required="">
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
            <input type="password" id="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="•••••••••" required="">
        </div>
        <div class="mb-6">
            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Confirm
                password</label>
            <input type="password" id="confirm_password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="•••••••••" required="">
        </div>
        <div class="flex items-start mb-6">
            <div class="flex items-center h-5">
                <input id="remember" type="checkbox" value=""
                    class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                    required="">
            </div>
            <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-400">I agree with the <a
                    href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
    <?php } ?>
@endsection
