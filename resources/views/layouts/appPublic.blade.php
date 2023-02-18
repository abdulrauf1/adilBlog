<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EWC</title>

     <!-- Favicons -->
    <link href="{{ asset('img/logo.svg') }}" rel="icon">
    <link href="{{ asset('img/logo.svg') }}" rel="apple-touch-icon">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/mobileResponsive.css') }}" />
    
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
      integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
      integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
      integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"></script>

     
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <!-- <div id="app"> -->
        
        <div class="header">
            <div class="logo">
                <img src="{{ asset('img/logo.svg') }}" alt="logo" />
            </div>
            <div class="menu">
                <ul onclick="closeMenu()" id="menuList">
                <li>
                    <a href="{{ url('') }}">Home</a>
                </li>
                <li>
                    <a href="{{ url('/about') }}">About</a>
                </li>
                <li>
                    <a href="{{ url('/blogs') }}">Blog</a>
                </li>
                </ul>
                <img id="menuIcon" onclick="openMenu()"  src="./img/menu.png" alt="">
            </div>
        </div>
        <main >
            @yield('content')
        </main>

        <!-- footer section here =============== -->
        <div class="footerr">
        <p class="topPara">Connenct to Future with Blogs</p>
        <h2>Request More Information</h2>
        <p class="secondPara">
            My Company, is a blog company company which is tell your a unique blog.
        </p>
        <button>Contact Us</button>
        <p class="thirdPara">© 2019mycompanyname, LLC</p>
        <div class="footerBottom">
            <div class="row1">
            <div class="logo">
                <img src="{{ asset('img/footerLogo.svg') }}" alt="footerLogo" />
            </div>
            <div class="links">
                <a href="#">About</a>
                <a href="#">Pricing</a>
                <a href="#">Blogs</a>
            </div>
            <div class="social">
                <a href="#"><img src="{{ asset('img/linkedin.svg') }}" alt="" /></a>
                <a href="#"><img src="{{ asset('img/Facebook.svg') }}" alt="" /></a>
                <a href="#"><img src="{{ asset('img/Instagram.svg') }}" alt="" /></a>
                <a href="#"><img src="{{ asset('img/Youtube.svg') }}" alt="" /></a>
            </div>
            </div>
        </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script
      src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
      integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    
    <!-- </div> -->
</body>
</html>
