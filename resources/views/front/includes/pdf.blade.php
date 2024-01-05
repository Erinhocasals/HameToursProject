<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="referrer" content="no-referrer-when-downgrade">
    <meta name="robots" content="all">
    <meta content="{{ app()->getLocale() }}" property="og:locale">

    <meta content="HameTours" property="og:site_name">
    <meta content="website" property="og:type">
    <meta content="https://www.hametours.com/" property="og:url">
    <meta content="Home" property="og:title">

    <link href="{{ route('home') }}" rel="canonical">
    <link href="{{ route('home') }}" rel="home">

    <title>HameTours</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front-template/assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front-template/assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front-template/assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" href="{{ asset('front-template/assets/img/favicons/favicon.png') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#111c26">

    <link rel="preload" href="{{ asset('front-template/fonts/basetica/basetica-light.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('front-template/fonts/basetica/basetica-light-italic.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('front-template/fonts/basetica/basetica-medium.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('front-template/fonts/basetica/basetica-medium-italic.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('front-template/fonts/wulkan/wulkan-display-medium.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('front-template/fonts/wulkan/wulkan-display-regular-italic.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('front-template/fonts/zeyada/zeyada-regular.woff2') }}" as="font" type="font/woff2" crossorigin>

    @stack('styles')

    <link rel='stylesheet' media="all" href="{{ env('APP_URL') }}/front-template/css/bootstrap.min.css">
    <link rel="stylesheet" media="all" href="{{ env('APP_URL') }}/admin-template/icons/fontawesome-free-6.0.0-beta2-web/css/all.min.css"/>
    <link rel="stylesheet" media="all" href="{{ env('APP_URL') }}/front-template/css/main.css">

    <link rel="stylesheet" media="all" href="{{ env('APP_URL') }}css/app.css }}">
    <link href="{{ env('APP_URL') }}/css/tailwind.min.css" media="all" rel="stylesheet">
    <link href="{{ env('APP_URL') }}/admin-template/css/style.css" media="all" rel="stylesheet">

    <link rel="stylesheet" media="all" href="{{ env('APP_URL') }}/front-template/third-party/hover-dark-mega-menu/style.css">
    <link rel="stylesheet" media="all" href="{{ env('APP_URL') }}/front-template/third-party/fullscreen-search-menu/dist/style.css">
    <link rel="stylesheet" media="all" href="{{ env('APP_URL') }}/front-template/third-party/bootstrap-datepicker/style.css">

    <link rel="stylesheet" media="all" href="{{ env('APP_URL') }}/front-template/third-party/add-to-cart-animation/dist/style.css">

    <link rel="stylesheet" media="all" href="{{ env('APP_URL') }}/front-template/third-party/user-profile-dropdown/dist/style.css">

    <link rel="stylesheet" media="all" href="{{ env('APP_URL') }}/front-template/css/toastr.min.css"/>

    @yield('post_styles')

    @livewireStyles

    <style>
        .page-transition {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 10;

            width: 100%;
            height: 100%;

            background-color: #f1efec;
        }
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body data-site-id="1">
    <div id="application" class="js-application">
        <main id="content" class="content js-main" data-track-id="page">
            <article class="@if ($element->showcase && $element->showcase->enabled) page-lodge @else page-generic @endif" data-view="pages/lodge" style="@if ($element->showcase && $element->showcase->enabled) background: transparent @endif">


                {{-- Section Description --}}
                <section class="block-lodge-intro" data-component="block-lodge-intro">
                    <div class="block-lodge-intro__container-content">
                        <h2 class="block-lodge-intro__subheading js-subheading text-white">
                            {{-- @if ($category)
                                <a href="{{ route('front.category', ['friendly' => $category->friendly]) }}">{!! $category->title !!}</a>
                            @elseif ($package)
                                <a href="{{ route('front.package', ['friendly' => $package->friendly]) }}">{!! $package->title !!}</a>
                            @endif --}}
                            {{ $element->title }}
                        </h2>

                        <h1 class="block-lodge-intro__heading js-heading text-white">
                            {!! $element->title !!}
                        </h1>

                        <div class="block-lodge-intro__container-body-map js-container-map">
                            <div class="block-lodge-intro__container-body" @if (!$element->latitude || !$element->longitude) style="width:100%" @endif>
                                {!! $element->content !!}

                                <div class="block-copy__container mt-5">
                                    <div class="block-copy__body">
                                        {{-- {!! $socialShares !!} --}}
                                    </div>
                                </div>
                            </div>

                            @if ($element->latitude && $element->longitude)
                                <div class="block-lodge-intro__container-map">
                                    <div class="block-lodge-intro__map mapbox" data-component="mapbox" style="width: 100%; height: 100%;"
                                        data-geojson='{"type":"FeatureCollection","features":[{"type":"Feature","geometry":{"type":"Point","coordinates":[-82.35784635403576,23.138069625614335]},"properties":{"title":"{{ $element->title }}","days":""}}]}'>
                                        <div class="mapbox__canvas js-map"></div>
                                        <nav class="mapbox__navigation">
                                            <button class="mapbox__button-zoom mapbox__button-zoom--in js-button-zoom-in">
                                                zoom in
                                            </button>
                                            <button class="mapbox__button-zoom mapbox__button-zoom--out js-button-zoom-out">
                                                zoom out
                                            </button>
                                        </nav>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="block-lodge-intro__container-list-image js-container-lis">

                            @if ($element->characteristics)
                                <section class="block-lodge-intro__list-highlights list-highlights">
                                    <h3 class="list-highlights__subheading text-white">
                                        {{ __('Highlights') }}
                                    </h3>
                                    <h2 class="list-highlights__heading text-white">
                                        <em>{{ __('Characteristics') }}</em>
                                    </h2>

                                    {!! $element->characteristics !!}

                                </section>
                            @endif

                            <div class="block-lodge-intro__image-wide">
                                <div class="responsive-image responsive-image--parallax">
                                    <picture class="responsive-image__picture " data-component="parallax" data-parallax-offset="200" data-parallax-direction="-1" data-parallax-start="-100">
                                        <img class="responsive-image__img lazyload" quickbeam="image"
                                            data-src="{{ asset('storage/' . $element->image->url) }}" alt="{{ $element->title }}"
                                            style="background-image: url({{ asset('storage/' . $element->image->url) }})">
                                    </picture>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </article>
        </main>
    </div>

    <script src="{{ env('APP_URL') }}/front-template/js/jquery-3.6.0.min.js"></script>
    <script src="{{ env('APP_URL') }}/front-template/js/axios.min.js"></script>

    <script src="{{ env('APP_URL') }}/front-template/js/quickbeam.min.js"></script>
    <script src="{{ env('APP_URL') }}/front-template/js/TweenMax.min.js"></script>

    <script src="{{ env('APP_URL') }}/front-template/js/toastr.min.js"></script>

    @stack('scripts')

    <script  src="{{ asset('front-template/third-party/add-to-cart-animation/dist/script.js') }}"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('front-template/js/custom-cursor-drag.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/templates.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/twig.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/enquire-overlay.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/common.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/main.bundle.js') }}"></script>

    <script src="{{ asset('front-template/js/jquery.blockUI.min.js') }}"></script>

    <script src="{{ asset('front-template/third-party/hover-dark-mega-menu/script.js') }}"></script>
    <script src="{{ asset('front-template/third-party/fullscreen-search-menu/dist/script.js') }}"></script>

    <script src="{{ asset('front-template/third-party/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('front-template/third-party/bootstrap-datepicker/jquery.dateFormat.js') }}"></script>
    <script src="{{ asset('front-template/third-party/bootstrap-datepicker/script.js') }}"></script>

    <script  src="{{ asset('front-template/third-party/user-profile-dropdown/dist/script.js') }}"></script>
</body>
