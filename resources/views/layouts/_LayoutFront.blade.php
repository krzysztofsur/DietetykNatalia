<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') -{{ config('app.name', 'Laravel') }} </title>

    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mainFront.css') }}" rel="stylesheet">
</head>

<body>

    
    <div id="app">
        <nav class="navbar sticky-top navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#MainMenu"
                aria-controls="MainMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt=""> </a>

            <div class="collapse navbar-collapse" id="MainMenu">
                <div class="navbar-nav float-right text-right pr-3">
                    <a class="nav-item nav-link <?= $activeMainMenu == 'home' ? 'active' : ''?>" href="{{ url('/') }}">Home</a>
                    <a class="nav-item nav-link" href="#">About Us</a>
                    <a class="nav-item nav-link <?= $activeMainMenu == 'request' ? 'active' : ''?>" href="/userRequest">Request</a>
                    <a class="nav-item nav-link <?= $activeMainMenu == 'contact' ? 'active' : ''?>" href="/contact">Contakt</a>
                    <a class="nav-item nav-link <?= $activeMainMenu == 'recipe' ? 'active' : ''?>" href="{{ url('/home') }}">Blog</a>
                </div>
            </div>
        </nav>

        <main id="main-page">
            @yield('main')
        </main>
    </div>

    <footer class="page-footer font-small">
        <div class="footer-copyright text-center">
            © 2018 Copyright:<a href="#"> ATH Ghost</a>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>
<script>

</script>
    @yield('script')
</body>

</html>