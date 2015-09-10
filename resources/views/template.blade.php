<!DOCTYPE html>
<html>
    <head>
        <title>Encryption tool</title>
        <link rel='stylesheet' type='text/css' href="{{ asset('/css/bootstrap.min.css') }}" />
        <meta name="google-signin-client_id" content="{{ env('GOOGLE_CLIENT_ID') }}">
        <style>
            body {
                width:850px;
                margin-left:auto;
                margin-right:auto;
                margin-top:20px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Encryption Tool</a>
                </div>
                @if (Session::has('user_info'))
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Logged in as {{ $name }}</a>
                    <li><a href="{{url('Logout')}}">Logout</a></li>
                <ul>
                @endif
            </div>
        </nav>
        <div class="row">    
            @yield('content')
        </div>
    </body>
    <script type='text/javascript' src="{{ asset('/javascript/aes.js')}}"></script>
    <script type='text/javascript' src="{{ asset('/javascript/encrypt.js') }}"></script>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
</html>
