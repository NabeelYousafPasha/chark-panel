<!--  SIDEBAR -->
<nav class="navbar-default navbar-static-side" role="navigation" style="position: fixed;">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span class="clear">
                        <span class="block m-t-xs text-center">
                            <a
                                href="{{ route('/') }}"
                            >
                                <strong class="font-bold">
                                {{ config('app.name') }}
                                </strong>
                            </a>
                        </span>
                        <br>
                            <img
                                alt="logo"
                                class="img-responsive"
                                src="{{ asset('frontend-assets/images/logo.png') }}"
                                onerror="this.src='{{ asset('frontend-assets/images/logo.png') }}'"
                            />
                    </span>
                </div>
                <div class="logo-element">
                    {{ config('app.name_abbr', 'V1') }}
                </div>
            </li>

            <li class="">
                <a href="{{ route('dashboard.index') }}">
                    <i class="fa-fw fa fa-dashboard"></i>
                    <span class="nav-label">
                        {{ trans('lang.sidebar.dashboard') }}
                    </span>
                </a>
            </li>

            <li class="">
                <a href="javascript:void(0)">
                    <i class="fa-fw fa fa-gear"></i>
                    <span class="nav-label">
                        Setup
                    </span>
                    <span class="fa-fw fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li class="">
                        <a
                            href="{{ route('dashboard.setup.permissions_roles.index') }}"
                        >
                            <i class="fa-fw fa fa-gears"></i>
                            <span class="nav-label custom-nav-label">
                                Role - Permission
                            </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="{{ route('dashboard.clinics.index') }}">
                    <i class="fa-fw fa fa-hospital-o"></i>
                    <span class="nav-label">
                        {{ 'Clinics' }}
                    </span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('dashboard.patients.index') }}">
                    <i class="fa-fw fa fa-users"></i>
                    <span class="nav-label">
                        {{ 'Patients' }}
                    </span>
                </a>
            </li>


            {{--<li class="">
                <a href="javascript:void(0)">
                    <i class="fa-fw fa fa-dashboard"></i>
                    <span class="nav-label">
                        {{ trans('lang.sidebar.dashboard') }}
                    </span>
                    <span class="fa-fw fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li class="">
                        <a
                            href="javascript:void(0)"
                        >
                            <i class="fa-fw fa fa-hand-grab-o"></i>
                            <span class="nav-label custom-nav-label">
                                {{ trans('lang.sidebar.home') }}
                            </span>
                            <span class="fa-fw fa arrow"></span>
                        </a>

                        <ul class="nav nav-third-level collapse">
                            <li class="">
                                <a
                                    href="javascript:void(0)"
                                >
                                    <i class="fa-fw fa fa-dashboard"></i>
                                    <span class="nav-label custom-nav-label">
                                        {{ trans('lang.sidebar.dashboard') }}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>--}}
        </ul>
    </div>
</nav>
