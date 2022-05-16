@extends('layouts.layoutAdminCorsi')
@section('body')
    <div id="myTabContent">

        <div class=" p-4 bg-gray-50 rounded-lg dark:bg-gray-800">

            <form action="{{ route('inserimentoDatiAdmin22NMRS')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Importa File</label>
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
                <button class="btn btn-primary">Import data</button>
            </form>
        </div>
    </div>
@endsection
