@extends('layouts.app')

@section('stylesheets')
    <style>
        body {
            /* Background Image */
            background-image: url("{{ asset('frontend-assets/images/bg-signup-min.jpg') }}");
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

        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">

                    <div class="text-center">
                        <img
                            src="{{ asset('frontend-assets/images/logo.png') }}"
                            alt="logo.png"
                            class="img-fluid"
                        >
                    </div>

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},

                    <form
                        class="d-inline"
                        method="POST"
                        action="{{ route('verification.resend') }}"
                    >
                        @csrf
                        <button
                            type="submit"
                            class="btn btn-link p-0 m-0 align-baseline color-pink"
                        >
                            {{ __('click here to request another') }}
                        </button>.
                    </form>
                </div>

                <div class="row mb-5">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <a
                            href="{{ route('retry.auth', ['auth' => 'login']) }}"
                            class="btn btn-pink btn-block color-white"
                        >
                            {{ __('Login') }}
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a
                            href="{{ route('retry.auth', ['auth' => 'register']) }}"
                            class="btn btn-pink btn-block color-white"
                        >
                            {{ __('Register') }}
                        </a>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>

    </div>
</div>
@endsection
