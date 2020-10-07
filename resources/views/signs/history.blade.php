@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>File signed</h1>
        </div>
        <div class="card-body">
            @if(count($signs) > 0)
                @php
                    $no = 1;
                @endphp
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>File name</th>
                            <th>Submitted on</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($signs as $sign)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td><a href="{{ route('signs.show', $sign->post_id) }}">{{$sign->file_name}}</a></td>
                                    <td>{{$sign->created_at}}</td>
                                    <td class="d-flex justify-content-between">Done<button class="btn btn-success h-75" disabled></button></td>
                                </tr>
                            @php
                                $no+=1;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No file</p>
            @endif
        </div>
    </div>
@endsection