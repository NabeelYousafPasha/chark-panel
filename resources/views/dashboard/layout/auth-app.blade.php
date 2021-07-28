<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sustainability Standards Implementation & Management System') }}</title>

    <link href="{{ asset('backend-assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend-assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('backend-assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('backend-assets/css/style.css') }}" rel="stylesheet">

    <style>
        .login{
            margin: 0 auto;
            padding: 100px 20px 20px 20px;
        }
    </style>

</head>

<body class="gray-bg">

<div class="container animated fadeInDown">

    @yield('auth-content')

    <hr/>

    <div class="row">
        <div class="col-md-12" align="center">
            <br>
            <strong>Copyright</strong>
            {{ config('constants.settings.auth.footer') }}
            &copy;
            {{ config('constants.settings.start_date') . '-' . date('Y') }}
        </div>
    </div>
</div>

</body>

</html>
