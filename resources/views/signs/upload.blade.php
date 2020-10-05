@extends('layouts.app')

@section('content')
    <a href="{{ url()->previous() }}" class="btn btn-dark">Go Back</a>
    <br><br>
    <div class="form-group">
        {!! Form::open(['action' => ['SignsController@uploading', $sign->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{Form::file('signed_file')}}
        {{Form::submit('Upload', ['class' => 'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
    
@endsection