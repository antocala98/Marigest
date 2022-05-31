<div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-lg">
                        REGIONE
                    <th scope="col" class="px-6 py-3 text-lg">
                        TOTALE ALLIEVI
                    </th>
                    <th scope="col" class="px-6 py-3 text-lg">
                        PERCENTUALE %
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg  text-gray-900 dark:text-white whitespace-nowrap">
                        Abruzzo
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('abruzzo')->get('totaleAbruzzo')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('abruzzo')->get('percentualeAbruzzo'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        Basilicata
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('basilicata')->get('totaleBasilicata')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('basilicata')->get('percentualeBasilicata'),2)
                        @endphp
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Calabria</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('calabria')->get('totaleCalabria')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('calabria')->get('percentualeCalabria'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Campania</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('campania')->get('totaleCampania')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('campania')->get('percentualeCampania'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Emilia Romagna</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('emilia')->get('totaleEmilia')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('emilia')->get('percentualeEmilia'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Friuli Venezia Giulia</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('friuli')->get('totaleFriuli')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('friuli')->get('percentualeFriuli'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Lazio</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('lazio')->get('totaleLazio')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('lazio')->get('percentualeLazio'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Liguria</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('liguria')->get('totaleLiguria')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('liguria')->get('percentualeLiguria'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Lombardia</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('lombardia')->get('totaleLombardia')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('lombardia')->get('percentualeLombardia'),2)
                        @endphp
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Marche</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('marche')->get('totaleMarche')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('marche')->get('percentualeMarche'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Molise</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('molise')->get('totaleMolise')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('molise')->get('percentualeMolise'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Piemonte</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('piemonte')->get('totalePiemonte')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('piemonte')->get('percentualePiemonte'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Puglia</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('puglia')->get('totalePuglia')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('puglia')->get('percentualePuglia'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Sardegna</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('sardegna')->get('totaleSardegna')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('sardegna')->get('percentualeSardegna'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Sicilia</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('sicilia')->get('totaleSicilia')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('sicilia')->get('percentualeSicilia'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Toscana</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('toscana')->get('totaleToscana')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('toscana')->get('percentualeToscana'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Trentino Alto Adige</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('trentino')->get('totaleTrentino')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('trentino')->get('percentualeTrentino'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Umbria</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('umbria')->get('totaleUmbria')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('umbria')->get('percentualeUmbria'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Valle d'Aosta</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('valle')->get('totaleValle')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('valle')->get('percentualeValle'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Veneto</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$regione->get('veneto')->get('totaleVeneto')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($regione->get('veneto')->get('percentualeVeneto'),2)
                        @endphp
                        
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>