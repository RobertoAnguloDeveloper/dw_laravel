<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div style="background-color: rgba(0, 0, 0, 0.699);" id="app" >
        <nav class="navbar navbar-expand-md navbar-light bg-warning shadow-sm">
            <div class="container">
                <a style="font-size: 50px; color: white; text-shadow: 1px 1px 1px #000;" class="navbar-brand" href="{{ url('/') }}">
                    <b>DesarrolloWeb</b>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul  class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li style="font-size: 20px; color: white; text-shadow: 1px 1px 1px #000;" class="nav-item">
                                    <center><b><a  class="btn nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a></b></center>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li style="font-size: 20px; color: white; text-shadow: 1px 1px 1px #000;" class="nav-item">
                                    <center><a class="btn nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a></center>
                                </li>
                            @endif
                        @else
                            <li class="dropdown">
                                <a style="font-size: 20px; color: white; text-shadow: 1px 1px 1px #000;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <b>{{ Auth::user()->name }}</b>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <form id="datosUsuario" action="/usuarios" method="POST">
                                        @csrf
                                        <input type="submit" class="dropdown-item" name="user_data" value="{{ __('Datos de usuario') }}">
                                    </form>

                                    <form id="datosUsuario" action="/usuarios" method="POST">
                                        @csrf
                                        <input type="submit" class="dropdown-item" name="user_data" value="{{ __('Administrar Usuarios') }}">
                                    </form>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf

                                    </form>



                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main style="background-color: rgba(0, 0, 0, 0.699);" class="py-5">
            @yield('content')
        </main>
    </div>

</body>
</html>
