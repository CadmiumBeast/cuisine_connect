@extends('auth.dashboard.admindashboard')
@section('buttonView')
    <div class="userinfo">
        <div class="userinfowrapper">
            @foreach($users as $user)
                <div class="userinfocard">
                    <h3>{{$user->name}}</h3>
                    <p>{{$user->email}}</p>
                    <div class="userinfocardbut">
                        <a href="{{route('admin.editCustomer',['customer' => $user])}}">Edit</a>
                        <form action="{{route('Admin.destroyCustomer', ['customer'=>$user])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </div>

            @endforeach
        </div>

    </div>@endsection
