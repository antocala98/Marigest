<{{$element}} {{ $attributes->merge(['type' => 'submit', 'class' => 'opacity-100 text-white hover:text-white border-2 border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center mr-2 dark:border-blue-500 dark:text-blue-500']) }}>
    {{ $slot }}
</{{$element}}>


