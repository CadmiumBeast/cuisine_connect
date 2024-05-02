<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Login | Cuisine Connect</title>
</head>

<body>
<div class="loginWrapper">
    <div class="login">
        <form action="{{route('authenticate')}}" method="post">
            @csrf
            <div class="loginImg">
                <a href="{{route('welcome')}}"><img src="{{asset('images\logo.png')}}" alt="logo"></a>
            </div>
            <div>
                <input type="text" placeholder="Email" class="@error('email') is-invalid @enderror" id="email"
                       name="email" value="{{ old('email') }}" /><br>
                @if($errors->has('email'))
                    <span>{{$errors->first('email')}}</span>
                @endif
            </div>
            <div>
                <input type="password" placeholder="Password" class="@error('password') is-invalid @enderror"
                       id="password" name="password" /><br>
                @if($errors->has('password'))
                    <span>{{$errors->first('password')}}</span>
                @endif
            </div>
            <div class="loginSubmit">
                <input type="submit" value="Login" />
                <div class="loginA">
                    <a href="{{route('register')}}">New to Cuisine Connect?</a><br>
                    {{-- <a href="#">Forgot password?</a> --}}
                </div>
            </div>
        </form>
    </div>
</div>
</body>

</html>
