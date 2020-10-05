@extends('layouts.app')

@section('content')
    <h1>Request Signature</h1>
    {!! Form::open(['action' => 'SignsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'File to sign')}}
        <br>
        {{Form::file('pdf_file')}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>
    <div class="form-group" id="employee">
        {{Form::label('assign', 'Assign Employee')}}
        <br>
        <div class="table-responsive">
            <table class="table" id="dynamic_assign">

            </table>
        </div>
        {{ csrf_field() }}
        {{-- @foreach ($users as $user)
            <div class="form-check">
                <label class="form-check-label" for="{{$user->id}}">
                    <input type="checkbox" class="form-check-input" id="{{$user->id}}" name="assign[]" value="{{$user->id}}">{{$user->name}}
                </label>
            </div>
        @endforeach --}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    <script>
        function plus(){
            document.getElementById('assign').innerHTML="wow";
        }
    </script>
@endsection