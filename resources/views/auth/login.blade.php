<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>login</title>
    
     <!-- Favicons -->
    <link href="{{ asset('img/logo.svg') }}" rel="icon">
    <link href="{{ asset('img/logo.svg') }}" rel="apple-touch-icon">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/adminlogin.css') }}">
    
    <!-- Scripts -->
   
</head>
<body>
    <div class="top">

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <img src="./../img/logo.svg" alt="">
            <label for="#">E-MAIL</label>
            <input id="email" type="email" placeholder="Email..." class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong><h5>{{ $message }}</h5></strong>
                </span>
            @enderror
            
            <label for="#">Password</label>
            <input id="password" type="password" placeholder="Password..." class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
