<!--
***********************************************************
Nabeel Yousaf Pasha
14-ARID-3675
+(92) 321-5031089
nabeelyousafpasha@gmail.com
***********************************************************
-->
<!DOCTYPE html>
<html lang="en">
<head>
	@include('dashboard.partials.header')
    @yield('stylesheets')
</head>
<body>
    <div id="wrapper">
        @include('dashboard.partials.sidebar')

    	<div id="page-wrapper" class="gray-bg dashbard-1">
            @include('dashboard.partials.navbar')

            @include('dashboard.partials.message')

            @include('dashboard.partials.error')

            @yield('content')

            @include('dashboard.partials.credits')
    	</div>
    </div>
    @include('dashboard.partials.footer')
    @yield('scripts')
</body>
</html>
