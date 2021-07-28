@extends('dashboard.layout.auth-app')

@section('auth-content')
    <div class="login">
        <div class="row">
            <div class="col-md-7">
                <a href="{{ route('/') }}">
                    <img
                        alt="image"
                        class="img-responsive"
                        src="{{ asset('s-sims.png') }}"
                    />
                </a>
            </div>
            <div class="col-md-5">
                <div class="ibox-content">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group @error('email') is-invalid has-error @enderror">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid has-error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group @error('password') is-invalid has-error @enderror">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid has-error @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary block full-width m-b">
                            {{ __('Login') }}
                        </button>
                    </form>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
