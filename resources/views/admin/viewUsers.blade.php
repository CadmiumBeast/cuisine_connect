@extends('auth.dashboard.admindashboard')
@section('buttonView')
    <div class="userinfo">
        <div class="userinfowrapper">
            @foreach($users as $user)
                <div class="userinfocard">
                    <h3>{{$user->name}}</h3>
                    <p>{{$user->email}}</p>
                    <div class="resinfocardbut">
                        <a >Edit</a>
                        <a >Delete</a>
                    </div>
                </div>

            @endforeach
        </div>

    </div>@endsection
