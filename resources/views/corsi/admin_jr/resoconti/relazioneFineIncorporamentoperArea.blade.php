<div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-lg">
                        AREA GEOGRAFICA 
                    </th>
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
                        Nord
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$area->get('nord')->get('totaleNord')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($area->get('nord')->get('percentualeNord'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        Centro
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$area->get('centro')->get('totaleCentro')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($area->get('centro')->get('percentualeCentro'),2)
                        @endphp
                        
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Sud</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$area->get('sud')->get('totaleSud')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 text-lg text-gray-900 dark:text-white whitespace-nowrap">
                        @php
                            echo round($area->get('sud')->get('percentualeSud'),2)
                        @endphp
                        
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>