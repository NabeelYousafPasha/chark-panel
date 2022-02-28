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

            @if(auth()->user()->can('view_permission_role'))
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
            @endif

            @if(auth()->user()->can('view_clinic'))
                <li class="">
                    <a href="{{ route('dashboard.clinics.index') }}">
                        <i class="fa-fw fa fa-hospital-o"></i>
                        <span class="nav-label">
                            {{ 'Clinics' }}
                        </span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->can('view_patient'))
                <li class="">
                    <a href="{{ route('dashboard.patients.index') }}">
                        <i class="fa-fw fa fa-users"></i>
                        <span class="nav-label">
                            {{ 'Patients' }}
                        </span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->can('view_user'))
                <li class="">
                    <a href="{{ route('dashboard.users.index') }}">
                        <i class="fa-fw fa fa-user-secret"></i>
                        <span class="nav-label">
                            {{ 'Users' }}
                        </span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
