<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

     <!-- Favicons -->
    <link href="{{ asset('img/logo.svg') }}" rel="icon">
    <link href="{{ asset('img/logo.svg') }}" rel="apple-touch-icon">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <!-- Scripts -->
    
</head>
<body>
    <header role="banner">
        <img src="./../img/logo.svg" alt="">
        <ul class="utilities">
          <br>
          <li class="users"><a href="{{ url('myAccount') }}">My Account</a></li>
          <li class="logout warn">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                Log Out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>

    </header>
      
    <nav role='navigation'>
    <ul class="main">
        <li class="{{ Request::is('admin') ? 'dashboard active' : 'dashboard' }}"><a href="{{ url('/admin') }}">Dashboard</a></li>
        <li class="{{ Request::is('myBlogs') ? 'blog active' : 'blog' }}"><a href="{{ url('/myBlogs') }}">My Blog</a></li>
        <li class="{{ Request::is('writeBlog') ? 'write active' : 'write' }}"><a href="{{ url('/writeBlog') }}">Write blogs</a></li>
        <li class="{{ Request::is('manageUsers') ? 'users active' : 'users' }}"><a href="{{ url('/manageUsers') }}">Manage Users</a></li>
    </ul>
    </nav>
    
    @yield('content')
        
</body>
</html>
