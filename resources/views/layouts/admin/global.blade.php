<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Desafío Creativo | Admin Template" />
	<meta name="format-detection" content="telephone=no">

    <title>{{ config('app.name', 'HameTours') }}</title>

	<link rel="shortcut icon" type="image/png" href="{{ asset('front-template/assets/img/apple-touch-icon.png') }}" />

	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="{{ asset('css/tailwind.min.css') }}" rel="stylesheet">

	@stack('styles')

    <style>
        .nice-select .list {
            bottom: 100%;
            top: auto !important;
        }
        table.dataTable tr th:last-child {
            width: 10%
        }
    </style>

    <link href="{{ asset('admin-template/vendor/nestable2/css/jquery.nestable.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-template/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-template/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('admin-template/css/custom.css') }}" rel="stylesheet">

	@livewireStyles

    @yield('post_styles')

</head>
<body data-primary="color_6">
    <div id="preloader">
        <div class="loader">
			<span>H</span>
			<span>A</span>
			<span>M</span>
			<span>E</span>
		</div>
    </div>

    <div id="main-wrapper">
        @include('layouts.admin.nav-header')

        @livewire('admin-nav')

        @include('layouts.admin.sidebar')

		<div class="content-body">
			<div class="container-fluid">
        		@yield('content')
			</div>
		</div>

        @include('layouts.admin.footer')
    </div>

    <!-- Required vendors -->
    <script src="{{ asset('admin-template/vendor/global/global.min.js') }}"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>


	@stack('scripts')

    <script src="{{ asset('admin-template/vendor/nestable2/js/jquery.nestable.min.js') }}"></script>
    <script src="{{ asset('admin-template/js/plugins-init/nestable-init.js') }}"></script>
	<script src="{{ asset('admin-template/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('admin-template/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>


    <script src="{{ asset('front-template/js/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('front-template/js/toastr.min.js') }}"></script>

    <script src="{{ asset('admin-template/js/custom.min.js') }}"></script>
	<script src="{{ asset('admin-template/js/deznav-init.js') }}"></script>
	<script src="{{ asset('admin-template/js/demo.js') }}"></script>

	@livewireScripts

</body>
</html>
