@extends('layouts.layoutAdminCorsi')
@section('body')
    <div id="myTabContent" class="flex justify-center">

        <div class="border h-auto my-10 w-9/12 p-4 border-4 rounded-lg shadow-xl">

            <form action="{{ route('inserimentoDatiAdmin22NMRS')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <label class="block mb-2 text-lg text-center font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Importa File</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50
            dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                   aria-describedby="user_avatar_help" name="file" id="customFile" type="file">
                <div class="text-center m-10">
                    @if($errors->any())
                        <h4>{{$errors->first()}}</h4>
                    @endif
                    @if(isset($feedback_utente))
                        <h4><br><b><?php echo $feedback_utente ?><b></h4>
                    @endif
                </div>
                <button class="btn btn-primary opacity-100 text-white hover:text-white border-2 border-white bg-gray-900
                focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center
                mr-2 dark:border-blue-500">Importa</button>
            </form>
        </div>
    </div>
@endsection
