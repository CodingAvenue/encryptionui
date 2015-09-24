<!DOCTYPE html>
<html>
    <head>
        <title>Encryption tool</title>
        <link rel='stylesheet' type='text/css' href="{{ asset('/css/bootstrap.min.css') }}" />
        <style>
            body {
                width:850px;
                margin-left:auto;
                margin-right:auto;
                margin-top:10px;
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
                    <li><a href="#">Logged in as {{ $data['given_name'] }}</a>
                    <li><a href="{{url('Logout')}}">Logout</a></li>
                <ul>
                @endif
            </div>
        </nav>
        <div class="row">    
            @yield('content')
            <hr />
            <div class='pull-right'>
                <small style='color:#929292'>Developed by Kim Lagonoy</small>
            </div>
        </div>
    </body>
    <script type='text/javascript' src="{{ asset('/javascript/aes.js')}}"></script>
    <script type='text/javascript' src="{{ asset('/javascript/sha3.js')}}"></script>
    <script type='text/javascript' src="{{ asset('/javascript/jquery.2.1.3.min.js')}}"></script>
    <script type='text/javascript' src="{{ asset('/javascript/jquery.zclip.js')}}"></script>
    <script type='text/javascript' src="{{ asset('/javascript/encrypt.js') }}"></script>
</html>
