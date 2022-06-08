@extends('layouts.layoutAddettoCorsi')
@section('body')
<div class="px-auto sm:pl-10 pt-10 pb-10 grid grid-cols-1 gap-4 md:grid md:grid-cols-2 lg:grid lg:grid-cols-3">
    <div div class=" mb-6 p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 ">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sezione Disciplinare</h5>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Gestione della situazione disciplinare degli allievi</p>
    <a href="{{ url('corsi/marescialli/addetto/sezione-disciplinare') }}" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Vai
        <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </a>
    </div>
    <div class="mb-6 p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 ">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sezione Sanitaria</h5>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Gestione della situazione sanitaria degli allievi<br><br></p>
    <a href="{{ url('corsi/marescialli/addetto/sezione-sanitaria') }}" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Vai
        <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </a>
    </div>
    <div class="mb-6 p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 ">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sezione Vestiario</h5>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Gestione del vestiario degli allievi<br><br></p>
    <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Vai
        <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </a>
    </div>
</div>

@endsection
