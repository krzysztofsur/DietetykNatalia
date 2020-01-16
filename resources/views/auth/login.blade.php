<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->    
    <link href="{{ asset('css/waves.min.css') }}" rel="stylesheet">

    <!-- Animation Css -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="msg">Zaloguj się</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">mail</i>
                        </span>
                        <div class="form-line">
                                <input id="email" placeholder="E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                                <input id="password" type="password" placeholder="Hasło" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input class="form-check-input filled-in chk-col-pink" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label for="remember">Zapamiętaj mnie</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Zaloguj</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('js/waves.min.js') }}"></script>

    
    <!-- Custom Js -->
    <script src="{{ asset('js/admin.js') }}"></script>

</body>

</html>