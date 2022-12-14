
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
<body style="background-color: rgba(0, 0, 0, 0.923);">
    <div id="app" >
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
                                <li class="nav-item">
                                    <center><b><a style="font-size: 20px; color: white; text-shadow: 1px 1px 1px #000;" class="btn nav-link" href="{{ route('login') }}">{{ __('Iniciar sesi??n') }}</a></b></center>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <center><a style="font-size: 20px; color: white; text-shadow: 1px 1px 1px #000;" class="btn nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a></center>
                                </li>
                            @endif
                        @else
                            <li class="dropdown">
                                <a style="font-size: 20px; color: white; text-shadow: 1px 1px 1px #000;" id="navbarDropdown" class="btn nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <b>{{ Auth::user()->name }}</b>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <form id="datosUsuario" action="/usuarios" method="POST">
                                        @csrf
                                        <input type="submit" class="dropdown-item" name="user_data" value="{{ __('Datos de usuario') }}">
                                    </form>

                                    <form id="gastosUsuario" action="/gastos" method="POST">
                                        @csrf
                                        <input type="submit" class="dropdown-item" name="gastoUser_list" value="{{ __('Gastos') }}">
                                    </form>

                                    @php
                                        $rol = \App\Http\Controllers\ControladorUsuario::rol();
                                    @endphp

                                    @if ($rol == 'admin')
                                        <form id="adminUsuarios" action="/usuarios" method="POST">
                                            @csrf
                                            <input type="submit" class="dropdown-item" name="user_list" value="{{ __('Administrar Usuarios') }}">
                                        </form>
                                        <form id="gastosUsuario" action="/gastos" method="POST">
                                            @csrf
                                            <input type="submit" class="dropdown-item" name="gastos_list" value="{{ __('Todos los gastos') }}">
                                        </form>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesi??n') }}
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

        <main class="py-4 ">
            @yield('content')
        </main>

    </div>

</body>
</html>
