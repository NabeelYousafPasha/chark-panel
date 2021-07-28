<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EOSD | Financials-4') }}</title>

    <link href="{{ asset('backend-assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend-assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    {{-- jQuery Steps CSS --}}
    <link href="{{ asset('backend-assets/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">

    {{-- Select 2 CSS --}}
    <link href="{{ asset('backend-assets/css/plugins/select2/select2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('backend-assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('backend-assets/css/style.css') }}" rel="stylesheet">

    <style>
        .landing-page .navbar-default .nav li a {
            color: #1ab394;
        }

        .landing-page .navbar-default .navbar-nav > .active > a, .landing-page .navbar-default .navbar-nav > .active > a:hover {
            background: transparent;
            color: #1ab394;
            border-top: 6px solid #1ab394;
        }

        .select2-container{
            width: 100% !important;
        }
    </style>
</head>

<body id="page-top" class="landing-page no-skin-config">

<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('/') }}">
                    {{ config('app.name', 'EOSD') }}
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<section class="timeline gray-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Become Our Member</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <br>
            </div>
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Register Here and Complete Profile after Login</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @includeIf('layouts.partials.errors')
                        <form
                            id="registration_form"
                            action="{{ route('register.store', [$invitation->invitation_token]) }}"
                            method="POST"
                            autocomplete="off"
                        >
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>Organization Information</h2>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group @error('organization.name') has-error @enderror">
                                                <label class="control-label">Title *</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="organization[name]"
                                                    placeholder=""
                                                    value="{{ old('organization.name') }}"
                                                    required
                                                />

                                                @error('organization.name')
                                                    <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group @error('organization.contact') has-error @enderror">
                                                <label class="control-label">Contact *</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="organization[contact]"
                                                    placeholder=""
                                                    value="{{ old('organization.contact') }}"
                                                    required
                                                />

                                                @error('organization.contact')
                                                    <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group @error('organization.website') has-error @enderror">
                                                <label class="control-label">Website *</label>
                                                <input
                                                    type="url"
                                                    class="form-control required"
                                                    name="organization[website]"
                                                    placeholder=""
                                                    value="{{ old('organization.website') }}"
                                                    required
                                                >

                                                @error('organization.website')
                                                    <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group @error('organization.address') has-error @enderror">
                                                <label class="control-label">Address *</label>
                                                <input
                                                    type="text"
                                                    class="form-control required"
                                                    name="organization[address]"
                                                    placeholder=""
                                                    value="{{ old('organization.address') }}"
                                                    required
                                                >

                                                @error('organization.address')
                                                    <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h2>Profile Information</h2>
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="form-group @error('user.name') has-error @enderror">
                                                <label class="control-label">Name *</label>
                                                <input
                                                    type="text"
                                                    class="form-control required"
                                                    name="user[name]"
                                                    placeholder=""
                                                    value="{{ $invitation->name ?? old('user.name') }}"
                                                />

                                                @error('user.name')
                                                    <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group @error('user.email') has-error @enderror">
                                                <label class="control-label">Email *</label>
                                                <input
                                                    type="email"
                                                    class="form-control required email"
                                                    name="email"
                                                    placeholder=""
                                                    value="{{ $invitation->email ?? old('user.email') }}"
                                                    required
                                                    disabled
                                                />
                                                <input
                                                    type="hidden"
                                                    class="form-control required email"
                                                    name="user[email]"
                                                    placeholder=""
                                                    value="{{ $invitation->email ?? old('user.email') }}"
                                                    required
                                                />

                                                @error('user.email')
                                                    <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group @error('user.password') has-error @enderror">
                                                <label class="control-label">Password *</label>
                                                <input
                                                    type="password"
                                                    id="password"
                                                    class="form-control required"
                                                    name="user[password]"
                                                    placeholder=""
                                                    value=""
                                                    minlength="8"
                                                    required
                                                />

                                                @error('user.password')
                                                    <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group @error('user.password_confirmation') has-error @enderror">
                                                <label class="control-label">Confirm Password *</label>
                                                <input
                                                    type="password"
                                                    id="confirm"
                                                    class="form-control"
                                                    name="user[password_confirmation]"
                                                    placeholder=""
                                                    value=""
                                                    required
                                                />

                                                @error('user.password_confirmation')
                                                    <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button
                                        type="submit"
                                        class="btn btn-primary btn-block"
                                    >
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<div class="row">
    <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
        <p>
            <strong>Copyright</strong> {{ config('app.name', 'Laravel') }} &copy; {{ date('Y') }}
        </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('backend-assets/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('backend-assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend-assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('backend-assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- Custom and plugin javascript -->
<script src="{{ asset('backend-assets/js/inspinia.js') }}"></script>
<script src="{{ asset('backend-assets/js/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('backend-assets/js/plugins/wow/wow.min.js') }}"></script>

<!-- Steps -->
<script src="{{ asset('backend-assets/js/plugins/steps/jquery.steps.min.js') }}"></script>
<!-- Jquery Validate -->
<script src="{{ asset('backend-assets/js/plugins/validate/jquery.validate.min.js') }}"></script>

<!-- Select2 JS -->
<script src="{{ asset('backend-assets/js/plugins/select2/select2.full.min.js') }}"></script>

<script>

    $(document).ready(function () {
        // select2
        $(".select2").select2();

        // scroll spy
        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
            header = document.querySelector( '.navbar-default' ),
            didScroll = false,
            changeHeaderOn = 10;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scroll
    new WOW().init();

</script>

</body>
</html>
