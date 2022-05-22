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
                class="inline-flex items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">Modifica dati Allievi</a>
        </div>
    </li>
@endsection
@section('body')
    <?php 
    if(isset($allievi)) { ?>
    <div id="myTabContent">
        <div class="p-4 bg-gray-50 rounded-lg mb-32 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                                    <a href="{{ route('modificaDatiAdmin22NMRS', ['id' => $allievo->id]) }} "
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
    <?php } else if(!isset($allievi) && !isset($feedback_utente)){   ?>
    <form method="POST" action="{{ route('aggiornaDatiAllievoAdmin') }}" enctype="multipart/form-data">
        @csrf
        <div class="m-11 grid gap-6 mb-24 lg:grid-cols-2">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <input hidden type="text" id="id" name="id" value="{{ $allievo->id }}">
                <div>
                    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nome</label>
                    <input type="text" id="nome" name="nome"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->nome }}">
                </div>
                <div>
                    <label for="cognome"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cognome</label>
                    <input type="text" id="cognome" name="cognome"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->cognome }}">
                </div>
                <div>
                    <label for="codice_fiscale"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Codice Fiscale</label>
                    <input type="text" id="codice_fiscale" name="codice_fiscale"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->codice_fiscale }}">
                </div>
                <div>
                    <label for="sesso" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sesso</label>
                    <input type="text" id="sesso" name="sesso"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->sesso }}">
                </div>
                <div>
                    <label for="data_nascita" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Data
                        di nascita</label>
                    <input type="date" id="data_nascita" name="data_nascita"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->data_nascita }}">
                </div>
                <div>
                    <label for="luogo_nascita" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Luogo
                        di nascita</label>
                    <input type="text" id="luogo_nascita" name="luogo_nascita"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->luogo_nascita }}">
                </div>
                <div>
                    <label for="provincia_nascita"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Provincia di nascita</label>
                    <input type="text" id="provincia_nascita" name="provincia_nascita"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->provincia_nascita }}">
                </div>
                <div>
                    <label for="nazione_nascita"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nazione di nascita</label>
                    <input type="text" id="nazione_nascita" name="nazione_nascita"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->nazione_nascita }}">
                </div>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div>
                    <label for="matricola_militare"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Matricola Militare</label>
                    <input type="text" id="matricola_militare" name="matricola_militare"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->matricola_militare }}">
                </div>
                <div>
                    <label for="matricola_universitaria"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Matricola
                        Universitaria</label>
                    <input type="text" id="matricola_universitaria" name="matricola_universitaria"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->matricola_universitaria }}">
                </div>
                <div>
                    <label for="categoria"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Categoria</label>
                    <input type="text" id="categoria" name="categoria"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->categoria }}">
                </div>
                <div>
                    <label for="corso" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Corso</label>
                    <input type="text" id="corso" name="corso"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->corso }}">
                </div>
                <div>
                    <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Foto</label>
                    <input type="file" id="foto" name="foto"
                    value="{{ $allievo->foto }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                </div>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div>
                    <label for="titolo_studio"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Titolo di studio</label>
                    <input type="text" id="titolo_studio" name="titolo_studio"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->titolo_studio }}">
                </div>
                <div>
                    <label for="voto_diploma" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Voto
                        diploma</label>
                    <input type="text" id="voto_diploma" name="voto_diploma"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->voto_diploma }}">
                </div>
                <div>
                    <label for="altro_titolo_studio"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Altro titolo di
                        studio</label>
                    <input type="text" id="altro_titolo_studio" name="altro_titolo_studio"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->altro_titolo_studio }}">
                </div>
                <div>
                    <label for="studio_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tipologia
                        altro titolo studio</label>
                    <input type="text" id="studio_2" name="studio_2"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->studio_2 }}">
                </div>
                <div>
                    <label for="livello_lingue"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Livello lingue</label>
                    <input type="text" id="livello_lingue" name="livello_lingue"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->livello_lingue }}">
                </div>
                <div>
                    <label for="lingue" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lingue
                        conosciute</label>
                    <input type="text" id="lingue" name="lingue"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->lingue }}">
                </div>
            </div>


            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div>
                    <label for="data_incorporamento"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Data atto arrivo</label>
                    <input type="date" id="data_incorporamento" name="data_incorporamento"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->data_incorporamento }}">
                </div>
                <div>
                    <label for="data_arrivo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Data
                        arrivo</label>
                    <input type="date" id="data_arrivo" name="data_arrivo"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->data_arrivo }}">
                </div>
                <div>
                    <label for="data_giuridica" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Data
                        giuridica</label>
                    <input type="date" id="data_giuridica" name="data_giuridica"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->data_giuridica }}">
                </div>
                <div>
                    <label for="status_attuale"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Motivazione</label>
                    <input type="text" id="status_attuale" name="status_attuale"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->status_attuale }}">
                </div>
                <div>
                    <label for="lavoro_precedente"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lavoro precedente</label>
                    <input type="text" id="lavoro_precedente" name="lavoro_precedente"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->lavoro_precedente }}">
                </div>
                <div>
                    <label for="motivo_arruolamento"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Motivo arruolamento</label>
                    <input type="text" id="motivo_arruolamento" name="motivo_arruolamento"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->motivo_arruolamento }}">
                </div>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div>
                    <label for="luogo_residenza"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Luogo di residenza</label>
                    <input type="text" id="luogo_residenza" name="luogo_residenza"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->luogo_residenza }}">
                </div>
                <div>
                    <label for="provincia_residenza"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Provincia di
                        residenza</label>
                    <input type="text" id="provincia_residenza" name="provincia_residenza"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->provincia_residenza }}">
                </div>
                <div>
                    <label for="indirizzo_residenza"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Indirizzo di
                        residenza</label>
                    <input type="text" id="indirizzo_residenza" name="indirizzo_residenza"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->indirizzo_residenza }}">
                </div>
                <div>
                    <label for="cap_residenza" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cap
                        di residenza</label>
                    <input type="text" id="cap_residenza" name="cap_residenza"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->cap_residenza }}">
                </div>
                <div>
                    <label for="luogo_domicilio"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Luogo domicilio</label>
                    <input type="text" id="luogo_domicilio" name="luogo_domicilio"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->luogo_domicilio }}">
                </div>
                <div>
                    <label for="provincia_domicilio"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Provincia di
                        domicilio</label>
                    <input type="text" id="provincia_domicilio" name="provincia_domicilio"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->provincia_domicilio }}">
                </div>
                <div>
                    <label for="indirizzo_domicilio"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Indirizzo di
                        domicilio</label>
                    <input type="text" id="indirizzo_domicilio" name="indirizzo_domicilio"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->indirizzo_domicilio }}">
                </div>
                <div>
                    <label for="cap_domicilio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cap
                        di domicilio</label>
                    <input type="text" id="cap_domicilio" name="cap_domicilio"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->cap_domicilio }}">
                </div>
                <div>
                    <label for="scalo_ferroviario"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Scalo ferroviario</label>
                    <input type="text" id="scalo_ferroviario" name="scalo_ferroviario"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->scalo_ferroviario }}">
                </div>
                <div>
                    <label for="comando_carabinieri"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Comando Carabinieri</label>
                    <input type="text" id="comando_carabinieri" name="comando_carabinieri"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->comando_carabinieri }}">
                </div>
                <div>
                    <label for="tribunale"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tribunale</label>
                    <input type="text" id="tribunale" name="tribunale"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->tribunale }}">
                </div>

            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div>
                    <label for="sport_praticato"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sport praticato</label>
                    <input type="text" id="sport_praticato" name="sport_praticato"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->sport_praticato }}">
                </div>
                <div>
                    <label for="livello_sport_praticato"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Livello sport
                        praticato</label>
                    <input type="text" id="livello_sport_praticato" name="livello_sport_praticato"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->livello_sport_praticato }}">
                </div>

                <div>
                    <label for="scuola_militare"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Scuola militare</label>
                    <input type="text" id="scuola_militare" name="scuola_militare"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->scuola_militare }}">
                </div>
                <div>
                    <label for="freq_accademia"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Frequentatore
                        accademia</label>
                    <input type="text" id="freq_accademia" name="freq_accademia"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->freq_accademia }}">
                </div>
                <div>
                    <label for="ruolo_normale"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ruolo normale
                        accademia</label>
                    <input type="text" id="ruolo_normale" name="ruolo_normale"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $allievo->freq_accademia }}">
                </div>
            </div>




        </div>
        <div class="flex justify-center">
            <x-button element="button" class="mb-32" type="submit">Aggiorna</x-button>
            <div>
    </form>
    <?php } else if(isset($feedback_utente)){  ?>
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
@endsection
