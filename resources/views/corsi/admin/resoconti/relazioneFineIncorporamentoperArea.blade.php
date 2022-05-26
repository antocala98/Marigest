<div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        AREA GEOGRAFICA
                    </th>
                    <th scope="col" class="px-6 py-3">
                        TOTALE ALLIEVI
                    </th>
                    <th scope="col" class="px-6 py-3">
                        PERCENTUALE
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Nord</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$area->get('nord')->get('totaleNord')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$area->get('nord')->get('percentualeNord')}}</h3>
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Centro</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$area->get('centro')->get('totaleCentro')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$area->get('centro')->get('percentualeCentro')}}</h3>
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>Sud</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$area->get('sud')->get('totaleSud')}}</h3>
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        <h3>{{$area->get('sud')->get('percentualeSud')}}</h3>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>