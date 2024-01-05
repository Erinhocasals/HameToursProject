<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin, dashboard, desafío creativo" />
	<meta name="author" content="Desafío Creativo" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Desafío Creativo | Admin Template" />
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>HameTours</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('front-template/assets/img/apple-touch-icon.png') }}" />

    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tailwind.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-template/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin-template/icons/fontawesome-free-6.0.0-beta2-web/css/brands.min.css') }}">

    @livewireStyles()

    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="vh-100">

    @yield('content')

    <script src="{{ asset('admin-template/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin-template/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin-template/js/deznav-init.js') }}"></script>

    @livewireScripts()
</body>
</html>
