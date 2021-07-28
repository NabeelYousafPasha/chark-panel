@extends('layouts.app')

@section('stylesheets')
    <style>
        body {
            /* Background Image */
            background-image: url("{{ asset('frontend-assets/images/bg-signup-min.jpg') }}");
            /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.7);
        }

        @media only screen and (max-width: 480px) {
            body {
                /* Background Image */
                background-image: url("{{ asset('frontend-assets/images/bg-signup-mobile-min.jpg') }}");
            }
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-6 col-md-8">
            <div class="card">
                <div class="card-body">

                    <div class="text-center">
                        <img
                            src="{{ asset('frontend-assets/images/logo.png') }}"
                            alt="logo.png"
                            class="img-fluid"
                        >
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="first_name" class="col-form-label text-md-left">
                                    {{ __('First Name') }}
                                </label>
                                <input
                                    id="first_name"
                                    name="first_name"
                                    type="text"
                                    class="form-control @error('first_name') is-invalid @enderror"
                                    value="{{ old('first_name') }}"
                                    placeholder="{{ __('First Name') }}"
                                    required
                                    autocomplete="first_name"
                                    autofocus
                                >
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="last_name" class="col-form-label text-md-left">
                                    {{ __('Last Name') }}
                                </label>
                                <input
                                    id="last_name"
                                    name="last_name"
                                    type="text"
                                    class="form-control @error('last_name') is-invalid @enderror"
                                    value="{{ old('last_name') }}"
                                    placeholder="{{ __('Last Name') }}"
                                    required
                                    autocomplete="last_name"
                                >
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone" class="col-form-label text-md-left">
                                    {{ __('Telephone') }}
                                </label>

                                <input
                                    id="phone"
                                    name="phone"
                                    type="tel"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}"
                                    placeholder="{{ __('Telephone') }}"
                                    required
                                    autocomplete="phone"
                                >

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email" class="col-form-label text-md-left">
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
                                >

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="address" class="col-form-label text-md-left">
                                    {{ __('Address') }}
                                </label>

                                <textarea
                                    id="address"
                                    name="address"
                                    class="form-control @error('address') is-invalid @enderror"
                                    placeholder="{{ __('Address') }}"
                                    required
                                    autocomplete="address"
                                    rows="2"
                                >{{ old('address') }}</textarea>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="city" class="col-form-label text-md-left">
                                    {{ __('City') }}
                                </label>

                                <input
                                    id="city"
                                    name="city"
                                    type="text"
                                    class="form-control @error('city') is-invalid @enderror"
                                    value="{{ old('city') }}"
                                    placeholder="{{ __('City') }}"
                                    required
                                    autocomplete="city"
                                >

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="state" class="col-form-label text-md-left">
                                    {{ __('State') }}
                                </label>

                                <input
                                    id="state"
                                    name="state"
                                    type="text"
                                    class="form-control @error('state') is-invalid @enderror"
                                    value="{{ old('state') }}"
                                    placeholder="{{ __('State') }}"
                                    required
                                    autocomplete="state"
                                >

                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="postal_code" class="col-form-label text-md-left">
                                    {{ __('Postal Code') }}
                                </label>

                                <input
                                    id="postal_code"
                                    name="postal_code"
                                    type="text"
                                    class="form-control @error('postal_code') is-invalid @enderror"
                                    value="{{ old('postal_code') }}"
                                    placeholder="{{ __('Postal Code') }}"
                                    required
                                    autocomplete="postal_code"
                                >

                                @error('postal_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="country_id" class="col-form-label text-md-left">
                                    {{ __('Country') }}
                                </label>

                                <select
                                    id="country_id"
                                    name="country_id"
                                    class="form-control"
                                    required
                                >
                                    <option value="">Country</option>
                                    @forelse($countries ?? [] as $countryId => $country)
                                        <option
                                            value="{{ $countryId }}"
                                            {{ (old('country_id') == $countryId) ? 'selected' : '' }}
                                        >
                                            {{ $country }}
                                        </option>
                                    @empty
                                        <option value="">No Countries Found</option>
                                    @endforelse
                                </select>

                                @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password" class="col-form-label text-md-left">{{ __('Password') }}</label>

                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="{{ __('Password') }}"
                                    required
                                    autocomplete="new-password"
                                >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password-confirm" class="col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                                <input
                                    id="password-confirm"
                                    name="password_confirmation"
                                    type="password"
                                    class="form-control"
                                    placeholder="{{ __('Confirm Password') }}"
                                    required
                                    autocomplete="new-password"
                                >
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button
                                    type="submit"
                                    class="btn btn-pink color-white btn-block"
                                >
                                    {{ __('Register') }}
                                </button>
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

                        <hr>

                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <span class="color-grey">
                                    {{ __('Already Registered?') }}
                                </span>
                                <a
                                    class="btn btn-link color-pink"
                                    href="{{ route('login') }}"
                                >
                                    <b>
                                        {{ __('Login') }}
                                    </b>
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-4"></div>
    </div>
</div>
@endsection
