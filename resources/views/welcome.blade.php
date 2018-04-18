<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LEGACY UNIVERSITY</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
            @if (Route::has('login'))
            <div class="top-left links">
                <a id="title">LEGACY UNIVERSITY</a>
            </div>
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}" id="toplinks">Home</a>
                    @else
                        <a href="{{ url('/login') }}" id="toplinks">Login</a>
                        <a href="{{ url('/register') }}" id="toplinks">Register</a>
                    @endif
                </div>
            @endif
             
        </div>
    </body>
</html>
