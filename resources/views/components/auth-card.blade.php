<div class="relative top-0 right-0 bottom-0 left-0 w-full h-full bg-fixed overflow-hidden bg-no-repeat bg-cover min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-900" style="
    background-position: 100%;
    background-image: url('../img/bg-img.jpg');
    height: 100%;
    ">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
