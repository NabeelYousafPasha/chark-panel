@extends('dashboard.layout.auth-app')

@section('auth-content')

<div class="reset-password login">
    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6">
            <a href="{{ route('/') }}">
                <img
                    alt="image"
                    class="img-responsive"
                    src="{{ asset('s-sims.png') }}"
                />
            </a>
        </div>

        <div class="col-md-3"></div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6">
            <div class="ibox-content">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form
                    method="POST"
                    action="{{ route('password.email') }}"
                >
                    @csrf
                    <div class="form-group">
                        <label
                            for="email"
                            class="text-md-right"
                        >
                            {{ __('E-Mail Address') }}
                        </label>
                        <input
                            id="email"
                            type="email"
                            class="form-control @error('email') is-invalid has-error @enderror"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            autofocus
                        >

                        @error('email')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button
                            type="submit"
                            class="btn btn-primary btn-block"
                        >
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </form>

                <div class="text-center">
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3"></div>
    </div>
</div>
@endsection
