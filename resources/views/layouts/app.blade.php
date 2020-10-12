<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();

            var count =1;

            $('#dynamic_assign').html('');
		    add_dynamic_assign(1);
            // $('#searchUser').keyup(function(){
            //     alert("msk");
            //     var query = $(this).val();
            //     if(query !=''){
            //         var _token=$('input[name ="_token"]').val();
            //         $.ajax({
            //             url:"{{ route('signs.fetch') }}",
            //             method:"POST",
            //             data:{query:query, _token:_token},
            //             success:function(data){
            //                 $('#searchList').fadeIn();
            //                 $('#searchList').html(data);
            //             }
            //         });
            //     }else{
            //         $('#searchList').fadeOut();
            //         $('#searchList').html("");
            //     }
            // });
            // $(document).on('click', '.listuser', function(){
            //     $('#searchUser').val($(this).val());
            //     $('#searchList').fadeOut();
            // });
            // $(document).on('click', '#assignEmployee', function(){
            //     let plus = document.getElementById("space");
            //     let div = document.getElementById("employee");
            //     let form = document.createElement('input');
            //     let line = document.createElement('br');
            //     form.id = "searchUser";
            //     form.name = "assign";
            //     form.className = "form-control";
            //     form.type = "text";
            //     form.placeholder = "Assign user";
            //     div.insertBefore(form, plus);
            // });
            function add_dynamic_assign(count){
                var button='';
                if(count>1){
                    button = '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-outline-dark remove">-</button>'
                }else{
                    button = '<button type="button" name="plus" id="plus_temp" class="btn btn-success btn-outline-dark disabled">+</button>'
                }
                output = '<tr id="row'+count+'">';
                output += '<td><select id="fetch'+count+'" required name="assign[]" class="form-control select_employee"><option disabled selected>Pilih karyawan yang harus menandatangani file</option>'+fetchingData()+'</select>';
                output += '<td align="left">'+button+'</td></tr>';
                $('#dynamic_assign').append(output);
            }
            
            $(document).on('change', '.select_employee', function(){
                if(document.getElementById('plus_temp')){
                    var plus_button = document.getElementById('plus_temp');
                plus_button.className = "btn btn-success btn-outline-dark";
                plus_button.id = "plus";
                }
            });
            
            $(document).on('click', '#plus', function(){
                count = count + 1;
                var plus_button = document.getElementById('plus');
                plus_button.className = "btn btn-success btn-outline-dark disabled";
                plus_button.id = "plus_temp";
                add_dynamic_assign(count);
            });
            $(document).on('click', '.remove', function(){
                var row_id = $(this).attr("id");
                $('#row'+row_id).remove();
            });

            function fetchingData(){
                var _token=$('input[name ="_token"]').val();
                $.ajax({
                    url:"{{ route('signs.fetch') }}",
                    method:"POST",
                    data:{_token:_token},
                    success:function(data){
                        $('#fetch'+count).append(data);
                    }
                });
            }
        } );
    </script>
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand text-light font-weight-bolder" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="/posts/create">Create Post</a>
                        </li> --}}
                        @auth
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/signs/create">Request Signature</a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/">{{ ('Home') }}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-light" href="/about">{{ ('About') }}</a>
                        </li> --}}
                        @auth
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('signs.history') }}">{{ ('History') }}</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="/posts">{{ ('Blog') }}</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/signs">{{ ('File') }}</a>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="/home" class="dropdown-item">Dashboard</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            @include('inc.messages')
            @yield('content')
        </main>
    </div>
</body>
</html>
