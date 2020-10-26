@if($details['purpose']=='requesting')
    <h3>Hi, {{$details['assigned_user']}}</h3>
    <p>You are assigned to sign a file named <a href="arnan.com/home">{{$details['title']}}</a></p>
    <br>
    <p>Description:</p>
    <p>{{$details['description']}}</p>
    <hr>
    <p>Sincerely, {{$details['user']}}</p>
@elseif($details['purpose']=='reviewing')
    <h3>Hi, {{$details['submitter_name']}}</h3>
    <p>Your file named <a href="arnan.com/signs">{{$details['title']}}</a> is being reviewed by {{$details['user']}}</p>
    <hr>
    <p>Sincerely, {{$details['user']}}</p>
@elseif($details['purpose']=='signed')
    <h3>Hi, {{$details['submitter_name']}}</h3>
    <p>{{$details['user']}} already signed your file named <a href="arnan.com/signs">{{$details['title']}}</a></p>
    <hr>
    <p>Sincerely, {{$details['user']}}</p>
@endif