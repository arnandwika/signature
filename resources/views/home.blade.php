@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/signs/create" class="btn btn-primary">Request Signature</a>
                    <br><br>
                    <h3>Assigned File For You</h3>
                    @if(count($signs)>0)
                        <table id="example" class="table table-striped table-bordered table-responsive-md" style="width:100%">
                            <thead>
                                <tr>
                                    <th>File name</th>
                                    <th>Submitted on</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($signs as $sign)
                                    <tr>
                                        <td>{{$sign->file_name}}</td>
                                        <td>{{$sign->created_at}}</td>
                                        <td>
                                            <a href="{{ route('signs.show', $sign->post_id) }}" class="btn btn-secondary">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>    
                        </table>
                    @else
                        <p>You have no file to sign</p>
                    @endif
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
