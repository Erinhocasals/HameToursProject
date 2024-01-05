<div class=" menu-desktop js-menu-desktop">
    <div class="menu-desktop__bar js-bar">
        <a class="menu-desktop__logo" href="{{ route('home') }}" aria-label="Inicio">
            <img src="{{ asset('front-template/assets/img/' . $logo) }}" alt="HAME Logo Black" id="desktop-white-logo" style="max-height: 250%; margin-top: -16px;">
            <img src="{{ asset('front-template/assets/img/logo.png') }}" id="desktop-logo" class="hidden" alt="HAME Logo" style="max-height: 250%; margin-top: -16px;">
        </a>
        <ul class="menu-desktop__list-buttons">
            @include('layouts.frontend.nav-items', ['menu_item_type' => 'desktop'])
        </ul>
        <div>
            <button class="menu-desktop__button-enquiry button-outline button-outline--inverted js-button-enquiry">
                <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                    <path
                        d="M.026 24l11.974-11.607 11.974 11.607h-23.948zm11.964-23.961l-11.99 8.725v12.476l7.352-7.127-5.653-4.113 10.291-7.488 10.309 7.488-5.655 4.108 7.356 7.132v-12.476l-12.01-8.725z" />
                </svg>
                <span class="button-outline__label js-label">
                    Contactar
                </span>
            </button>

            {{-- Profile Menu --}}
            <div class="menu-container ml-3">
                <button class="menu-button px-3" @auth @if (Auth::user()->hasVerifiedEmail()) @else onclick="document.location='{{ route('login') }}'" @endif @else onclick="document.location='{{ route('login') }}'" @endauth>
                    @auth
                        @if (Auth::user()->hasVerifiedEmail())
                            <img src="{{ Auth::user()->profile_photo_url }}"><span class="title">{{ Auth::user()->name }}</span>
                        @else
                            <span class="title">{{ __('Login') }}</span>
                        @endif
                    @else
                        <span class="title">{{ __('Login') }}</span>
                    @endauth
                </button>
                @auth
                    @if (Auth::user()->hasVerifiedEmail())
                        <div class="menu-dropdown">
                            <div class="content">
                                <ul>
                                    @hasanyrole('super-admin|admin|editor|agency')
                                    <li><a href="{{ route('admin.dashboard') }}" class="block w-full px-3 py-2 text-left text-gray-700 transition hover:bg-gray-100 focus:outline-none focus:bg-gray-100">{{ __('Dashboard') }}</a></li>
                                    @endhasanyrole
                                    <li><a href="{{ route('profile.show') }}" class="block w-full px-3 py-2 text-left text-gray-700 transition hover:bg-gray-100 focus:outline-none focus:bg-gray-100">{{ __('Profile') }}</a></li>
                                    <li>
                                        <a href="{{ route('teams.show', Auth::user()->ownedTeams->first()->id) }}" class="block w-full px-3 py-2 text-left text-gray-700 transition hover:bg-gray-100 focus:outline-none focus:bg-gray-100">{{ __('Team Settings') }}</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="block w-full px-3 py-2 text-left text-gray-700 transition hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                                                <span>{{ __('Log Out') }} </span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                @endauth
            </div>

            <div class="menu_btn load-animation" role="button">
                <a href="#" title="open menu">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                    width="30" height="30"
                    viewBox="0 0 50 50"
                    style=" fill:#fff;"><path d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z"></path></svg></a>
            </div>
        </div>
    </div>
    <div class="menu-desktop-overlay js-overlay" id="menu-desktop-overlay">

        @include('front.includes.svg-map', ['svgMap' => 'loading-background', 'opacity' => 0.1])

        <div class="menu-desktop-overlay__container-lists">

            @foreach ($menus as $menu)
                @if ($menu->style == 1)
                    @foreach ($menu->links as $link)
                        @if ($link->menuable && $link->menuable->image)
                            <div class="hero-center-section">
                                <div class="left-text">{{ $link->menuable->title }}</div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div class="img-wrap">
                                                <img src="{{ asset('storage/' . $link->menuable->image->url) }}" alt="{{ $link->menuable->name }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach

            <div class="section padding-top-bottom over-hide z-bigger" id="hero-section-z-bigger">
                <ul class="slide-buttons">
                    @foreach ($menus as $menu)
                        @if ($menu->style == 1)
                            @foreach ($menu->links as $link)
                                @if ($link->menuable && $link->menuable->enabled && $link->menuable->image)
                                    <li class=""><a href="{{ $link->url }}" class="hover-target" data-hover="{{ $link->menuable->title }}">{{ $link->menuable->title }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </ul>
            </div>

            <button class="button button-close overlay-enquiry__button-close js-button-close outer" id="outer"
                style="position: absolute; right: -100px; width: auto">
                <span class="button-close__label js-label" style="opacity: 1; visibility: inherit;">{{ __('Close') }}</span>
                <div class="button-close__icon js-icon">
                    <canvas class="button-close__icon-background js-icon-background"
                        style="transform: translate(0px); will-change: transform;border: 1px dashed #ffffff; border-radius: 50%; cursor: pointer;"
                        width="45" height="45"></canvas>
                    <span class="button-close__icon-line js-icon-line" style="opacity: 1; visibility: inherit;"></span>
                    <span class="button-close__icon-line js-icon-line" style="opacity: 1; visibility: inherit;"></span>
                </div>
            </button>

            <!--<div class="outer" id="outer">
                <div class="inner">
                    <label>Cerrar</label>
                </div>
            </div>-->

            <!-- Page cursor
            ================================================== -->

            <div class='cursor menu-cursor hidden' id="cursor"></div>
            <div class='cursor2 menu-cursor hidden' id="cursor2"></div>
            <div class='cursor3 menu-cursor hidden' id="cursor3"></div>

            <canvas class="menu-desktop-overlay__canvas js-canvas" id="menu-canvas"></canvas>

            {{-- Section Standard Menus --}}
            @foreach ($menus as $menu)
                @if ($menu->style == 2 && !$menu->grouped && count($menu->links) > 1)
                    <ul class="menu-desktop-overlay__list js-list" data-id=" menu-{{ $menu->id }} ">
                        @include('layouts.frontend.nav-items-inner', ['menu_item_type' => 'desktop'])
                    </ul>
                @endif
            @endforeach

        </div>
    </div>
</div>
