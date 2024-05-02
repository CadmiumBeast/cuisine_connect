<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Register | Cuisine Connect</title>
</head>

<body>
<div class="RegisterWrapper">
    <form action="{{ route('store') }}" method="post">
        @csrf
        <a href="{{route('welcome')}}"><img src="{{asset('images\logo.png')}}" alt="logo"></a>
        <div>
            <input type="text" class=" @error('name') is-invalid @enderror" placeholder="Username" id="name"
                   name="name" value="{{ old('name') }}"><br>
            @if ($errors->has('name'))
                <span>{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email"
                   id="email" name="email" value="{{ old('email') }}"><br>
            @if ($errors->has('email'))
                <span>{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="password" id="password" name="password"><br>
            @if ($errors->has('password'))
                <span>{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div>
            <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password"
                   name="password_confirmation">
        </div>
        <div>
            <select class="form-select" aria-label="Who are You?" id="type" name="type">
                <option selected>Select</option>
                <option value="Customer">Customer</option>
                <option value="Restaurants">Restaurants</option>
            </select>
        </div>
        <div class="RegisSubmit">
            <input type="submit" value="Register">
            <div class="RegisterA">
                <a href="{{route('login')}}">Already a member?</a>
            </div>
        </div>
    </form>
</div>
</body>

</html>
