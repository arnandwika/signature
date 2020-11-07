@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>File submitted</h1>
        </div>
        <div class="card-body">
            @if(count($signs ?? '') > 0)
                @php
                    $no = 1;
                @endphp
                <table id="example" class="table table-striped table-bordered table-responsive-lg" style="width:100%">
                    <thead>
                        <tr>
                            <th>File name</th>
                            <th>Submitted on</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($signs ?? '' as $sign)
                                <tr>
                                    <td><a href="{{ route('signs.show', $sign->id) }}">{{$sign->file_name}}</a></td>
                                    <td>{{$sign->created_at}}</td>
                                    @foreach ($assigned_users as $assigned_user)
                                    @if($assigned_user->post_id == $sign->id && $assigned_user->status == 0 && $checked_red != 1)
                                        @php
                                            $checked_red = 1;
                                            $checked_green = 0;
                                            $checked_yellow = 0;
                                        @endphp
                                    @elseif($assigned_user->post_id == $sign->id && $assigned_user->status == 1 && $checked_yellow != 1 && $checked_red != 1)
                                        @php
                                            $checked_yellow = 1;
                                            $checked_green = 0;
                                        @endphp
                                    @elseif($assigned_user->post_id == $sign->id && $assigned_user->status == 2 && $checked_green != 1 && $checked_yellow != 1 && $checked_red != 1)  
                                        @php
                                            $checked_green = 1;
                                        @endphp
                                    @endif
                                    @endforeach
                                    @if($checked_red == 1)
                                        <td class="d-flex justify-content-between">Waiting<button class="btn btn-danger h-75" disabled></button></td>
                                        @php
                                            $checked_red = 2;
                                        @endphp
                                    @endif
                                    @if ($checked_yellow == 1)
                                        <td class="d-flex justify-content-between">Reviewing<button class="btn btn-warning h-75" disabled></button></td>
                                        @php
                                            $checked_yellow = 2;
                                        @endphp
                                    @endif
                                    @if ($checked_green == 1)
                                        <td class="d-flex justify-content-between">Done<button class="btn btn-success h-75" disabled></button></td>
                                        @php
                                            $checked_green = 2;
                                        @endphp
                                    @endif
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