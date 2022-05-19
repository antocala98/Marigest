@extends('layouts.layoutAdminJuniorCorsi')
@section('body')
    <div id="myTabContent">
        
        <div class=" p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
            @if($errors->any())
            <h4>{{$errors->first()}}</h4>
            @endif
            <form action="{{ route('inserimentoDatiAdminJunior22NMRS')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                    <div class="custom-file text-left">
                        <input type="file" name="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <button class="btn btn-primary">Import data</button>
            </form>
        </div>
    </div>
@endsection