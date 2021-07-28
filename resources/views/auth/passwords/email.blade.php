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
        <div class="col-lg-5 col-md-6 mt-5">
            <div class="card">

                <div class="card-body">

                    <div class="text-center">
                        <img
                            src="{{ asset('frontend-assets/images/logo.png') }}"
                            alt="logo.png"
                            class="img-fluid"
                        >
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="mt-3">
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="email" class="col-form-label text-md-left">{{ __('Email Address') }}</label>

                                <input
                                    id="email"
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
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
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button
                                    type="submit"
                                    class="btn btn-pink color-white btn-block"
                                >
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-7 col-md-6"></div>
    </div>
</div>
@endsection
