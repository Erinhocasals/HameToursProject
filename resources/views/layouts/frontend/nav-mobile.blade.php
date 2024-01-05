<div class=" menu-mobile js-menu-mobile">
    <div class="menu-mobile__bar js-bar">
        <a class="menu-mobile__logo w-1/5" href="{{ route('home') }}" aria-label="Home">
            <img src="{{ asset('front-template/assets/img/' . $logo) }}" alt="HAME Logo">
        </a>
        {{-- <span class="menu-mobile__currency-selector js-currency-selector currency-selector" data-active-currency="ESP">
            <div class="dropdown js-dropdown" id="dropdown-currency-select-mobile">
                <div class="dropdown__label" id="dropdown-label-currency-select-mobile"> Idioma:</div>
                <div class="dropdown__container-select">
                    <select id="currency-select-mobile" class="dropdown__select js-select">
                        <option data-label="€ EUR" data-value="ESP" value="ESP">ESP</option>
                        <option data-label="£ GBP" data-value="ENG" value="ENG">ENG</option>
                        <option data-label="$ AUD" data-value="ITA" value="ITA">ITA</option>
                    </select>
                    <svg class="dropdown__icon" width="7" height="10" viewBox="0 0 7 10" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.243.757L5.485 5 1.243 9.243" stroke="currentColor" stroke-width="1.5" fill="none" fill-rule="evenodd"/>
                    </svg>
                </div>

                <button class="dropdown__button button js-button" aria-labelledby="dropdown-label-currency-select-mobile dropdown-label-button-currency-select-mobile" aria-haspopup="listbox" type="button">
                    <span class="dropdown__container-label">
                        <span class="dropdown__label-button js-label" id="dropdown-label-button-currency-select-mobile">
                            Idioma
                        </span>
                        <svg class="dropdown__icon" width="7" height="10" viewBox="0 0 7 10"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.243.757L5.485 5 1.243 9.243" stroke="currentColor" stroke-width="1.5" fill="none" fill-rule="evenodd"/>
                        </svg>
                     </span>
                </button>

                <ul class="dropdown__list is-hidden js-list" id="dropdown-list-currency-select-mobile" aria-labelledby="dropdown-label-currency-select-mobile" role="listbox" tabindex="-1">
                    <li class="dropdown__list-item js-list-item" id="dropdown-list-item-currency-select-mobile-0"
                        data-label="ESP" data-value="ESP" role="option">
                        ESP
                    </li>
                    <li class="dropdown__list-item js-list-item" id="dropdown-list-item-currency-select-mobile-1"
                        data-label="ENG" data-value="ENG" role="option">
                        ENG
                    </li>
                    <li class="dropdown__list-item js-list-item" id="dropdown-list-item-currency-select-mobile-2"
                        data-label="ITA" data-value="ITA" role="option">
                        ITA
                    </li>
                </ul>
            </div>
        </span> --}}
        <div class="menu-mobile__container-buttons-bar">
            <div class="menu-container mr-2">
                <button class="menu-button px-1" @auth @if (Auth::user()->hasVerifiedEmail()) @else onclick="document.location='{{ route('login') }}'" @endif @else onclick="document.location='{{ route('login') }}'" @endauth>
                    @auth
                        @if (Auth::user()->hasVerifiedEmail())
                            <img src="{{ Auth::user()->profile_photo_url }}"><span class="title">{{  Str::limit(Auth::user()->name, 15, '...') }}</span>
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

            <div class="menu_btn load-animation button-burger mr-2" role="button">
                <a href="#" title="open menu" style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                    width="15" height="15"
                    viewBox="0 0 50 40"
                    style=" fill:#fff;"><path d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z"></path></svg></a>
            </div>

            <button class="menu-mobile__button-burger js-button-burger button-burger" aria-label="Show menu">
                    <span class="button-burger__container-bars">
                        <span class="button-burger__bar js-bar"></span>
                        <span class="button-burger__bar js-bar"></span>
                        <span class="button-burger__bar js-bar"></span>
                    </span>
            </button>
        </div>
    </div>

    <div class="menu-mobile-overlay js-overlay">

        @include('front.includes.svg-map', ['svgMap' => "", 'opacity' => 0.2])

        <div class="menu-mobile-overview js-overview">
            <ul class="menu-mobile-overview__list-buttons">
                @include('layouts.frontend.nav-items', ['menu_item_type' => 'mobile'])
            </ul>

            <div class="menu-mobile-overview__container-buttons-circle flex-column items-center gap-3">
                @if ($data && $data->hame_phone)
                    <button class="menu-mobile-overview__button-circle menu-mobile-overview__button-circle--email button-circle js-button-circle" onclick="tel:{{ $data->hame_phone }}">
                        <span class="button-circle__container text-center flex flex-column items-center justify-center">
                            {{-- <svg class="button-circle__icon" width="25" height="18" viewBox="0 0 25 18" xmlns="http://www.w3.org/2000/svg"><g
                                    transform="translate(-245 -455)" fill="none" fill-rule="evenodd"><path
                                    d="M269.754 455.065c-.033-.033-.098-.033-.13-.033h-24.008c-.033 0-.098 0-.13.033a.39.39 0 00-.162.162c-.032.032-.032.097-.032.13v16.847c0 .033 0 .033.032.065v.033h.032l.065.064s.033 0 .033.033c.032.032.097.032.13.032h24.008c.194 0 .324-.13.324-.324v-16.75c0-.033 0-.098-.033-.13.033-.065-.032-.13-.13-.162zm-23.814 1.069l9.04 9.04-9.04 6.318v-15.358zm13.316 9.17a2.269 2.269 0 01-3.24 0l-9.59-9.624h22.453l-9.623 9.623zm-3.79.356l.096.097a2.923 2.923 0 002.074.875c.745 0 1.49-.292 2.074-.875l.097-.097 8.78 6.123h-21.935l8.813-6.123zm13.866 5.832l-9.04-6.318 9.04-9.04v15.358z"
                                    fill="currentColor" fill-rule="nonzero"/></g></svg> --}}
                            <svg class="button-contact__icon button-contact__icon--telephone" width="23" height="24"
                                    viewBox="0 0 23 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.852 17.581l-2.84-1.88a2.614 2.614 0 00-2.745-.083l-2.37 1.11a.788.788 0 01-.763.022c-.128-.066-.267-.135-.413-.207-1.607-.796-4.035-1.998-5.83-5.956a.784.784 0 01.054-.749l1.061-2.126c.495-.793.514-1.79.05-2.602L6.17 1.805a2.6 2.6 0 00-3.4-1.039C.993 1.64.064 3.106.007 5.128c-.01.214-.175 4.27 1.902 8.58 3.499 7.262 10.542 9.316 15.83 9.76.04.004.326.032.737.032 1.064 0 2.96-.185 3.551-1.442l.625-1.065a2.548 2.548 0 00-.8-3.412zm.304 3.121l-.637 1.088c-.546 1.16-2.872 1.192-3.727 1.106-7.471-.628-12.638-3.796-15.355-9.416C.405 9.275.58 5.194.582 5.154v-.007c.05-1.818.849-3.083 2.44-3.865a2.02 2.02 0 012.647.808l1.889 3.305c.358.628.343 1.4-.053 2.037L6.444 9.557c-.237.38-.266.853-.078 1.268 1.88 4.144 4.521 5.452 6.099 6.233.144.071.28.138.405.203.42.216.914.202 1.296-.025l2.37-1.11a2.048 2.048 0 012.159.055l2.84 1.88a1.974 1.974 0 01.62 2.641z"
                                        fill="currentColor" fill-rule="nonzero"></path>
                                </svg>
                            <span class="button-circle__label">
                                {{ $data->hame_phone }}
                            </span>
                        </span>
                    </button>
                @endif

                @if ($data && $data->hame_email)
                    <button class="menu-mobile-overview__button-circle menu-mobile-overview__button-circle--email button-circle js-button-circle" onclick="mailto:{{ $data->hame_email }}">
                        <span class="button-circle__container text-center flex flex-column items-center justify-center">
                            <svg class="button-circle__icon" width="25" height="18" viewBox="0 0 25 18" xmlns="http://www.w3.org/2000/svg"><g
                                    transform="translate(-245 -455)" fill="none" fill-rule="evenodd"><path
                                    d="M269.754 455.065c-.033-.033-.098-.033-.13-.033h-24.008c-.033 0-.098 0-.13.033a.39.39 0 00-.162.162c-.032.032-.032.097-.032.13v16.847c0 .033 0 .033.032.065v.033h.032l.065.064s.033 0 .033.033c.032.032.097.032.13.032h24.008c.194 0 .324-.13.324-.324v-16.75c0-.033 0-.098-.033-.13.033-.065-.032-.13-.13-.162zm-23.814 1.069l9.04 9.04-9.04 6.318v-15.358zm13.316 9.17a2.269 2.269 0 01-3.24 0l-9.59-9.624h22.453l-9.623 9.623zm-3.79.356l.096.097a2.923 2.923 0 002.074.875c.745 0 1.49-.292 2.074-.875l.097-.097 8.78 6.123h-21.935l8.813-6.123zm13.866 5.832l-9.04-6.318 9.04-9.04v15.358z"
                                    fill="currentColor" fill-rule="nonzero"/></g></svg>
                            <span class="button-circle__label p-2" style="word-break: break-word">
                                {{ $data->hame_email }}
                            </span>
                        </span>
                    </button>
                @endif
            </div>
        </div>

        <div class="menu-mobile-thumbnails js-thumbnails">
            <button class="menu-mobile-thumbnails__button-back js-button-back">
                <svg class="menu-mobile-thumbnails__icon-button-back" width="7" height="10" viewBox="0 0 7 10" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.243.757L5.485 5 1.243 9.243" stroke="currentColor" stroke-width="1.5"
                          fill="none" fill-rule="evenodd"/>
                </svg>
                {{ __('Go back') }}
            </button>

            @foreach ($menus as $menu)
                @if (!$menu->grouped && count($menu->links) > 1)
                    <div class="menu-mobile-thumbnails__container-list-group" data-group="menu-{{ $menu->id }}">
                        <div class="menu-mobile-thumbnails__heading">
                            {{ $menu->title }}
                        </div>
                        <ul class="menu-mobile-thumbnails__list-group">

                            @include('layouts.frontend.nav-items-inner', ['menu_item_type' => 'mobile'])

                            <li class="menu-mobile-thumbnails__list-item-group menu-mobile-thumbnails__list-item-group--back">
                                <button class="menu-mobile-thumbnails__button-back js-button-back">
                                    <svg class="menu-mobile-thumbnails__icon-button-back" width="7" height="10"
                                        viewBox="0 0 7 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.243.757L5.485 5 1.243 9.243" stroke="currentColor"
                                            stroke-width="1.5" fill="none" fill-rule="evenodd"/>
                                    </svg>
                                    {{ __('Go back') }}
                                </button>
                            </li>
                        </ul>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
</div>
