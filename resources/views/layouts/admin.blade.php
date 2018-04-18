<!DOCTYPE html>
<html lang="en">
<head>
        <title>ADMIN PANEL</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
         <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="/css/adminpanel.css" rel="stylesheet">
    </head>
    <body>
    <nav class="navbar navbar-expand-md navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="/admin">
                    Dashboard
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-link"><a href="/faculties">Faculties</a></li>
                    <li class="nav-link"><a href="/departments">Departments</a></li>
                    <li class="nav-link"><a href="/students">Students</a></li>
                    <li class="nav-link"><a href="/courses">Courses</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-link"> <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="get" style="display: none;">
                                @csrf
                        </form></li>
                </ul>
            </div>
        </div>
    </nav>
  
@include('partials.messages')
@yield('content');

   <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/adminpanel.js') }}"></script>
    </body>
</html>
