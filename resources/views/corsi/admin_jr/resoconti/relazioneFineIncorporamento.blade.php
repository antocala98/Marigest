@extends('layouts.layoutAdminJuniorCorsi')
@section('breadc')
    <li>
        <div class="flex items-center">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <a href="{{url('corsi/marescialli/adminJ/schede-riepilogative')}}" class="inline-flex items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">Schede Ripielogative</a>
        </div>
    </li>
    <li>
        <div class="flex items-center">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <a href="{{url('corsi/marescialli/adminJ/schede-riepilogative/Relazione-fine-incorporamento')}}" class="inline-flex pl-2 items-center text-sm font-medium text-white hover:scale-110 dark:text-gray-400 dark:hover:text-white">Schede Relazione di fine incorporamento</a>
        </div>
    </li>
@endsection

@section('body')
    <div id="accordion-collapse" data-accordion="collapse">
        <h2 id="accordion-collapse-heading-1">
            <button type="button" class="flex justify-between items-center p-5 w-full font-medium text-left text-gray-500 rounded-t-xl border border-b-1 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-1" aria-expanded="false" aria-controls="accordion-collapse-body-1">
              <span>Relazione per anno di nascita degli allievi a fine incorporamento</span>
              <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </h2>
        
        <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Anno di nascita
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Età
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Totale Allievi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Percentuale
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Anni as $anno)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{$anno->data_nascita}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$anno->eta}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$anno->totale}}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            echo round($anno->percentuale, 2) ; 
                                        @endphp
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mb-16">
            <h2 id="accordion-collapse-heading-2">
                <button type="button" class="flex justify-between items-center p-5 w-full font-medium text-left text-gray-500 rounded-t-xl border border-b-1 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                  <span>Relazione fine incorporamento per area geografica di residenza</span>
                  <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden " aria-labelledby="accordion-collapse-heading-2">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <div class="hidden">
                        {{$area}}
                    </div>
                    <!--Includo una Sub Vista. Il div di prima serve a passare la variabile alla vista di sotto -->
                @include('corsi.admin.resoconti.relazioneFineIncorporamentoperArea',['area'=> $area])
                </div>
            </div>
            <h2 id="accordion-collapse-heading-3">
                <button type="button" class="flex justify-between items-center p-5 w-full font-medium text-left text-gray-500 rounded-t-xl border border-b-1 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                  <span>Relazione fine incorporamento per regione di residenza</span>
                  <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-3" class="hidden " aria-labelledby="accordion-collapse-heading-3">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <div class="hidden">
                        {{$regione}}
                    </div>
                   <!--Includo una Sub Vista. Il div di prima serve a passare la variabile alla vista di sotto --> 
                @include('corsi.admin_jr.resoconti.relazioneFineIncorporamentoperRegioni',['regione'=> $regione])
                </div>
        </div>
        
    </div>

@endsection