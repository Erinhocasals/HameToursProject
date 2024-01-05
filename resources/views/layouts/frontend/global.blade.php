<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="referrer" content="no-referrer-when-downgrade">
    <meta name="robots" content="all">
    <meta content="{{ app()->getLocale() }}" property="og:locale">

    <meta content="HameTours" property="og:site_name">
    <meta content="website" property="og:type">
    <meta content="https://www.hametour.com/" property="og:url">
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
    <link rel="preload" href="{{ asset('front-template/fonts/futura/futuhv.ttf') }}" as="font" type="font/truetype" crossorigin>
    <link rel="preload" href="{{ asset('front-template/fonts/futura/futult.ttf') }}" as="font" type="font/truetype" crossorigin>

    @stack('styles')

    <link rel='stylesheet' href="{{ asset('front-template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-template/icons/fontawesome-free-6.0.0-beta2-web/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('front-template/css/main.css') }}">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="{{ asset('css/tailwind.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin-template/vendor/nestable2/css/jquery.nestable.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-template/css/style.css') }}" rel="stylesheet">



    <link rel="stylesheet" href="{{ asset('front-template/third-party/hover-dark-mega-menu/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-template/third-party/fullscreen-search-menu/dist/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-template/third-party/bootstrap-datepicker/style.css') }}">

    {{-- <link rel='stylesheet' href='https://raw.githubusercontent.com/greenwoodents/quickbeam.js/master/demo/css/demo.css'> --}}
    <link rel="stylesheet" href="{{ asset('front-template/third-party/add-to-cart-animation/dist/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-template/third-party/user-profile-dropdown/dist/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-template/css/toastr.min.css') }}"/>

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
        .overlay-enquiry__container.open {
            animation-name: slideleft;
            animation-duration: 0.5s;
        }

        @-webkit-keyframes slideleft {
            from {
                left: 100%;
            }
            to {
                left: 0;
            }
        }
        @keyframes slideleft {
            from {
                left: 100%;
            }
            to {
                left: 0;
            }
        }
        .goog-te-gadget {
            text-transform: uppercase;
        }
        .goog-te-gadget-simple  {
            background-color: rgba(255,255,255,0.20)!important;
            border: 1px solid rgba(255,255,255,0.50) !important;
            padding: 8px!important;
            /* border-radius: 25px!important; */
            line-height:0!important;
            display: inline-block;
            cursor: pointer;
            zoom: 1;
            font-family: "Basetica Medium", sans-serif;
            font-size: .75rem;
            letter-spacing: .03em;
            line-height: 1.5rem;
            text-transform: uppercase;
            position: fixed;
            right: 0;
            top: 12%;
        }
        .goog-te-gadget-simple .goog-te-menu-value span {
            top: -0.9rem !important;
            position: relative;
            display: none
        }
        .goog-te-gadget-simple > img {
            content: url({{ asset('front-template/assets/img/icons/icons8-google-translate-48.png') }})
        }
        .goog-te-menu-frame {
            max-width:100% !important; //or whatever width you want
        }
        .goog-te-menu2 {
            max-width: 100% !important;
            overflow: scroll !important;
            box-sizing:border-box !important;
            height:auto !important;
        }
        select.goog-te-combo{width:100%!important;}
        .goog-te-menu-value {
            color: #fff !important;
            &:before {
                font-family: 'Material Icons';
                content: "\E927";
                margin-right: 16px;
                font-size: 2rem;
                vertical-align: -10px;
                // width:32px!important;
            }
        }
        .goog-te-menu-value span:nth-child(5) {
            display:none;
        }
        .goog-te-menu-value span:nth-child(3) {
            border:none!important;
            font-family: 'Material Icons';
            &:after {
                font-family: 'Material Icons';
                content: "\E5C5";
                font-size: 1.5rem;
                vertical-align: -6px;
            }
        }

        .goog-te-gadget-icon {
            background-image: url(https://img.icons8.com/color/344/google-translate.png)!important;
            background-position: 0px 0px;
            height: 32px!important;
            width: 32px!important;
            margin-right: 8px!important;
            /* display: none; */
        }
        .goog-logo-link{
            display:none !important;
        }
        .goog-te-gadget{
            color:transparent!important;
        }
        .goog-te-banner-frame{
            display:none !important;
        }
        .goog-tooltip {
            display: none !important;
        }
        .goog-tooltip:hover {
            display: none !important;
        }
        .goog-text-highlight {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }
        body {
            top: 0 !important
        }

    </style>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-C1DNGLPFW2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-C1DNGLPFW2');
    </script>
</head>

<body data-site-id="1">
    <div id="application" class="js-application">

        @livewire('front-pages', ['logo' => $logo])

        <div class="scroll-container-overlays" data-scroll-container="overlays" data-scroll-container-damping="0.15">
        </div>

        @yield('sticky-reservation')

        @livewire('cookies-bar')

        <div class="js-currency-price js-currency-symbol js-dropdown"></div>

        <div class="full-screen-image" data-component="full-screen-image">
            <canvas class="full-screen-image__canvas js-canvas"></canvas>
            <button class="full-screen-image__button-close js-button-close" aria-label="Close image"></button>
        </div>

        <div class="page-transition js-page-transition" data-type="fade"></div>
        <div class="custom-cursor custom-cursor-drag" data-component="custom-cursor-drag">
            <span class="custom-cursor-drag__dot custom-cursor-drag__dot--left js-dot-left"></span>
            <span class="custom-cursor-drag__dot custom-cursor-drag__dot--right js-dot-right"></span>

            <canvas class="custom-cursor-drag__outline js-outline"></canvas>
            <span class="custom-cursor-drag__inner js-inner"></span>
        </div>
    </div>

    <script src="{{ asset('front-template/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('front-template/js/axios.min.js') }}"></script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <script>
        document.querySelector('.js-button-enquiry').addEventListener("click", function() {
            document.querySelector('.scroll-container-overlays').classList.remove('hidden');
            document.querySelector('.overlay-enquiry__container').classList.add('open');
        });

        document.querySelector('.js-button-circle').addEventListener("click", function() {
            document.querySelector('.scroll-container-overlays').classList.remove('hidden');
            document.querySelector('.overlay-enquiry__container').classList.add('open');
        });

        document.querySelector('.contact__button-close').addEventListener("click", function() {
            document.querySelector('.scroll-container-overlays').classList.add('hidden');
            document.querySelector('.overlay-enquiry__container').classList.remove('open');
        });

        document.querySelector('.contact-captcha img').addEventListener("click", function() {
            $.ajax({
                type: 'GET',
                url: '{{ route('front.captcha.reload') }}',
                success: function (data) {
                    $(".contact-captcha span").html(data.captcha);
                }
            });
        })

        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                autoDisplay: 'true',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }

        !function (d) {
            if (!d.currentScript) {
                var s = d.createElement('script')
                s.src = 'js/polyfills.js'
                d.head.appendChild(s)
            }
        }(document)
    </script>

    <script src="{{ asset('front-template/js/quickbeam.min.js') }}"></script>
    <script src="{{ asset('front-template/js/TweenMax.min.js') }}"></script>

    <script src="{{ asset('front-template/js/toastr.min.js') }}"></script>

    @if ($message = Session::get('success'))
        <script>toastr.info('{{ $message }}');</script>
    @elseif ($message = Session::get('error'))
        <script>toastr.error('{{ $message }}');</script>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @if ($error == 'validation.captcha')
                <script>toastr.error('Código captcha inválido');</script>
            @else
                <script>toastr.error('{{ $error }}');</script>
            @endif
        @endforeach
    @endif

    @stack('scripts')

    <script  src="{{ asset('front-template/third-party/add-to-cart-animation/dist/script.js') }}"></script>

    <script src="{{ mix('js/app.js') }}" defer></script>

    <script src="{{ asset('front-template/js/custom-cursor-drag.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/templates.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/twig.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/enquire-overlay.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/common.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/main.bundle.js') }}"></script>

    <script src="{{ asset('admin-template/vendor/nestable2/js/jquery.nestable.min.js') }}"></script>
    <script src="{{ asset('admin-template/js/plugins-init/nestable-init.js') }}"></script>

    <script src="{{ asset('front-template/js/jquery.blockUI.min.js') }}"></script>

    <script src="{{ asset('front-template/third-party/hover-dark-mega-menu/script.js') }}"></script>
    <script src="{{ asset('front-template/third-party/fullscreen-search-menu/dist/script.js') }}"></script>

    <script src="{{ asset('front-template/third-party/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('front-template/third-party/bootstrap-datepicker/jquery.dateFormat.js') }}"></script>
    <script src="{{ asset('front-template/third-party/bootstrap-datepicker/script.js') }}"></script>

    <script  src="{{ asset('front-template/third-party/user-profile-dropdown/dist/script.js') }}"></script>

    @livewireScripts

</body>

</html>
