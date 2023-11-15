<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MakeYourOwnCanvas - @yield('titulo')</title>

        <!--FONTS-->
        @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])

    </head>
    <body>
        <header>
            <div id="header">
                <div id="titulo">
                    <h1><a href="{{ route('home') }}">MakeYourOwnCanvas</a></h1>
                </div>
                @auth
                    <div id="nav">
                        <nav>
                            <div>
                                <ul>
                                    <li>
                                        <span>{{ auth()->user()->username }}</span>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                                            </svg>                                              
                                        </div>
                                    </li>
                                    @admin
                                        <li>
                                            <a href="{{ route('home') }}">Canvas</a>
                                        </li>
                                    @endadmin
                                    @survey
                                        <li>
                                            <a href="{{ route('canva.index') }}">Mis Canvas</a>
                                        </li>
                                    @endsurvey
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit">
                                                Cerrar Sesi&oacute;n
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                @endauth
            </div>
        </header>

        <main>
            <h2>
                <div id="yiel_titulo">
                    @yield('icono')
                    @yield('titulo')
                </div>
                <span></span>
            </h2>

            @yield('contenido')
        </main>

        <footer>
            <div>
                <span>Aplicaciones Web 2 - Todos los derechos Reservados &copy; {{ now()->year }}</span>
            </div>
        </footer>

        @yield('scripts')
    </body>
</html>
