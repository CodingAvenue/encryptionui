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
        <h3>Encryption Tool</h3>
        <hr/>
        <div class="row">    
            @yield('content')
        </div>
    </body>
    <script type='text/javascript' src="{{ asset('/javascript/aes.js')}}"></script>
    <script type='text/javascript' src="{{ asset('/javascript/encrypt.js') }}"></script>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
</html>
