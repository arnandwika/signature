@extends('layouts.app')

@section('content')
    <a href="{{ url()->previous() }}" class="btn btn-dark">Go Back</a>
    <br><br><br>
    <div class="text-center">
        <img src="/images/checkedFile.png" alt="no image" style="height: 6cm"></img>
        <br><br>
        <h1>Pastikan File yang diupload benar dan sudah ditandatangani</h1>
        <br><br>
        <div class="form-group">
        {!! Form::open(['action' => ['SignsController@uploading', $sign->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{Form::file('signed_file')}}
        {{Form::submit('Upload', ['class' => 'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
    </div>
@endsection