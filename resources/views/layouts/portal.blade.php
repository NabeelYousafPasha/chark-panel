<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('frontend-assets/images/favicon.png') }}"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Font Awesome 4 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .btn-pink {
            background-color: #FF5959;
        }

        .color-pink {
            color: #FF5959;
        }

        .color-grey {
            color: #adadad;
        }

        .color-white {
            color: #ffffff;
        }

        .portal-navabr {
            background-color: rgba(255, 255, 255, 0.8) !important;
            border-bottom: 1px solid #FF5959;
        }

        footer {
            width: 100%;
            margin-top: 5vh;
            bottom: 0;
            background-color: black;
        }
    </style>

    @yield('stylesheets')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm portal-navabr">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img
                        src="{{ asset('frontend-assets/images/logo.png') }}"
                        alt="logo.png"
                        class="img-fluid"
                    >
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            @if(auth()->user()->can('view_dashboard'))
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="{{ route('dashboard.index') }}"
                                    >
                                        {{ __('Dashboard') }}
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ auth()->user()->first_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();"
                                    >
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>

        <footer>
            <div class="mb-0">
                <div class="container text-center">
                    <p class="text-white mb-0 py-3">
                        © {{ config('app.name') }}
                    </p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Toastr -->
    <script src="{{ asset('js/plugins/toastr/toastr.min.js') }}"></script>

    <script type="text/javascript">
        toastr.options = {
            closeButton: true,
            progressBar: true,
            debug: false,
            positionClass: 'toast-bottom-right',
            showMethod: 'slideDown',
            timeOut: 5000
        };
    </script>

    @if(session("successToastr"))
        <script type="text/javascript">
            toastr.success("{{ session("successToastr") }}");
        </script>
    @endif

    @if(session("errorToastr"))
        <script type="text/javascript">
            toastr.error("{{ session("errorToastr") }}");
        </script>
    @endif

    @if(session("warningToastr"))
        <script type="text/javascript">
            toastr.warning("{{ session("warningToastr") }}");
        </script>
    @endif

    @if(session("infoToastr"))
        <script type="text/javascript">
            toastr.info("{{ session("infoToastr") }}");
        </script>
    @endif

    @stack('scripts')
</body>
</html>
