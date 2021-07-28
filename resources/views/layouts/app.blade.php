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
    </style>

    @yield('stylesheets')
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

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
