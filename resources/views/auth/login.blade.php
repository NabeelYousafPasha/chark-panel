@extends('layouts.app')

@section('stylesheets')
    <style>
        body {
            /* Background Image */
            background-image: url("{{ asset('frontend-assets/images/bg-login-min.jpg') }}");
            /* Full height */
            height: 100vh;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.7);
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-5 col-md-6 col-sm-8">
            <div class="card">

                <div class="card-body">

                    <div class="text-center">
                        <img
                            src="{{ asset('frontend-assets/images/logo.png') }}"
                            alt="logo.png"
                            class="img-fluid"
                        >
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="mt-3">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">
                                {{ __('Email Address') }}
                            </label>

                            <input
                                id="email"
                                name="email"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                placeholder="{{ __('Email Address') }}"
                                required
                                autocomplete="email"
                                autofocus
                            >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">
                                {{ __('Password') }}
                            </label>

                            <input
                                id="password"
                                name="password"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="{{ __('Password') }}"
                                required
                                autocomplete="current-password"
                            >

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button
                                    type="submit"
                                    class="btn btn-pink btn-block color-white"
                                >
                                    {{ __('Login') }}
                                </button>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="col-md-12 text-center">
                                    <a
                                        class="btn btn-link color-grey"
                                        href="{{ route('password.request') }}"
                                    >
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <a
                                    class="btn btn-pink btn-block color-white"
                                    href="{{ route('register') }}"
                                >
                                    {{ __('Register') }}
                                </a>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <a
                                    class="btn btn-link color-grey"
                                    href="javascript:void(0)"
                                >
                                    &copy; {{ config('app.name') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-6 col-sm-4"></div>
    </div>
</div>
@endsection
