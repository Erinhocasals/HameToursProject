<nav class="navigation-filter" role="navigation">
    <h2>main navigation</h2>

    <input type="hidden" id="baseUrl" value="{{ url('/') }}">

    <style>
        .block-newsletter__input.full-width {
            width: 100% !important;
        }
        .block-newsletter__input .block-footer__link {
            font-size: initial;
        }
        input::placeholder {
            font-family: "Basetica Light", sans-serif !important;
        }
    </style>

    <div class="panel panel--left">
        <ul class="menu">
            @foreach ($filters as $filter)
                <li><a href="#" title="{!! $filter->title !!}"><span class="litem-group">{!! $filter->title !!}</span></a>
                    <ul class="sub-menu">
                        @foreach ($filter->filters as $f)
                            <li><a href="#" title="{!! $f->title !!}"><span class="litem" data-id="{{ $f->id }}">{!! $f->title !!} ({{ count($f->entities) }})</span></a></li>
                            <input type="checkbox" class="hidden filter-checkboxes" id="filter_{{ $f->id }}" name="filters[]" value="{{ $f->id }}">
                        @endforeach
                    </ul>
                    <i class="line"></i>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="panel panel--right">
        <div class="close_btn"><a href="#">{{ __('Close') }}</a></div>
        <div class="data">
            <div class="data__search">
                <div class="block-newsletter__input input-container w-full">
                    <input class="input js-input" type="text" id="input__search" placeholder="Escriba lo que desea buscar" data-required="">
                    <label class="input-label text-white" for="input__search">Escriba lo que desea buscar</label>
                </div>
                <div class="block-newsletter__input full-width input-container">
                    <div class="input-daterange input-group flight-datepicker" id="flight-datepicker">
                        <div class="form-item">
                            <label class="text-white" for="input__start">Fecha de Inicio</label><span class="fontawesome-calendar"></span>
                            <input class="input js-input" type="text" id="input__start" placeholder="Inicio" data-date-format="DD, MM d"/><span class="date-text date-depart"></span>
                        </div>
                        <div class="form-item">
                            <label class="text-white" for="input__end">Fecha de Fin</label><span class="fontawesome-calendar"></span>
                            <input class="input js-input" type="text" id="input__end" placeholder="Fin" data-date-format="DD, MM d"/><span class="date-text date-return"></span>
                        </div>
                    </div>
                </div>

                <button class="button-outline mt-5 btn__search">
                    <span class="button-outline__label js-label">
                        {{ __('Press to search') }}
                    </span>
                </button>
            </div>

            <div class="data__content mt-5" id="filter__content">
                {!! $search_template->content !!}
            </div>
        </div>
    </div>
</nav>

<nav class="navigation js-navigation" data-component="navigation" id="navigation">
    <div id="google_translate_element"></div>

    @include('layouts.frontend.nav-mobile')
    @include('layouts.frontend.nav-desktop')
</nav>

<div class="scroll-container-pages" data-scroll-container="pages" data-scroll-container-damping="0.15" data-scroll-container-active="true">
    @yield('content')
    @include('layouts.frontend.footer')
</div>

<div id="quick-cart" quickbeam="cart">
    @auth
        @if (auth()->user()->openReservation())
            @foreach (auth()->user()->openReservation()->elements as $element)
                <div class="quick-cart-product quick-cart-product-static open" id="quick-cart-product-{{ $element->elementable_id }}">
                    <div class="quick-cart-product-wrap">
                        <img src="@if ($element->elementable && $element->elementable->image) {{ asset('storage/' . $element->elementable->image->url) }} @else @if ($element->elementable) {{ asset('storage/' . $element->elementable->category->svg) }} @endif  @endif">
                        <span class=" s1" style="background-color: #000; opacity: .5">$800.00</span>
                        <span class=" s2">
                            <a href="{{ $element->elementable->frontLink() }}">
                                <img src="https://ui-avatars.com/api/?name={{ $element->type() }}&color=CCCCCC&background=000000">
                            </a>
                        </span>
                    </div>
                    <span class="count fadeUp" id="quick-cart-product-count-{{ $element->elementable_id }}">{{ $element->quantity }}</span>
                    <span class="quick-cart-product-remove remove" data-model="{{ strtolower($element->type()) }}" data-id="{{ $element->elementable_id }}"></span>
                    <span class="quick-cart-product-removeall removeall" data-id="{{ $element->elementable_id }}"></span>
                </div>
            @endforeach
        @endif
    @endauth

    <a id="quick-cart-pay" quickbeam="cart-pay" class="cart-ico" href="{{ route('front.cart') }}">
      <span>
        <strong class="quick-cart-text text-2xl"><i class="fa fa-receipt"></i></strong>
        <span id="quick-cart-price">@if (auth()->user() && auth()->user()->openReservation()) {{ auth()->user()->openReservation()->totalElements() }} @else 0 @endif</span>
        <span id="quick-cart-pay-total-count" style="display: none">0</span>
      </span>
    </a>
</div>

<div class="scroll-container-overlays hidden" data-scroll-container="overlays" data-scroll-container-damping="0.15" style="position: fixed; width: 100%; transform: matrix(1, 0, 0, 1, 0, -8.09123e-05);">
    <aside class="overlay-enquiry" data-component="overlay-enquiry" data-track-id="enquire" style="opacity: 1; visibility: inherit;">
        <div class="overlay-enquiry__background js-background" style="opacity: 1; visibility: inherit;"></div>
        <div class="overlay-enquiry__container js-container">
            <button class="button button-close overlay-enquiry__button-close contact__button-close js-button-close">
                <span class="button-close__label js-label" style="opacity: 1; visibility: inherit;">{{ __('Close') }}</span>
                <div class="button-close__icon js-icon">
                    <canvas class="button-close__icon-background js-icon-background" width="45" height="45"
                        style="transform: rotate(34.7019deg); will-change: transform;border: dashed 1px;border-radius: 50%;"></canvas>
                    <span class="button-close__icon-line js-icon-line" style="opacity: 1; visibility: inherit;"></span>
                    <span class="button-close__icon-line js-icon-line" style="opacity: 1; visibility: inherit;"></span>
                </div>
            </button>
            <div class="overlay-enquiry__container-contact">
                <div class="overlay-enquiry__container-call">
                    <span>
                        @foreach ($templates as $template)
                            @if ($template->friendly == 'contact-us-left')
                                {!! $template->subtitle !!}
                            @endif
                        @endforeach
                    </span>
                    <h2 class="overlay-enquiry__heading text-white">
                        @foreach ($templates as $template)
                            @if ($template->friendly == 'contact-us-left')
                                {!! $template->title !!}
                            @endif
                        @endforeach
                    </h2>
                    <p class="overlay-enquiry__body">
                        @foreach ($templates as $template)
                            @if ($template->friendly == 'contact-us-left')
                                {!! $template->content !!}
                            @endif
                        @endforeach
                    </p>

                    <div class="mb-5 mt-5 flex" style="gap: 10px">
                        @if ($data && $data->hame_phone)
                            <a class="mt-0 mb-3 overlay-enquiry__button-contact button-contact" href="tel:{{ $data->hame_phone }}" rel="noopener noreferrer" target="_blank">
                                <svg class="overlay-enquiry__dashed-circle dashed-circle" width="42" height="42"
                                    viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="21" cy="21" r="20.5" fill="none" fill-rule="evenodd" stroke="currentColor"
                                        stroke-dasharray="1, 1" stroke-width="0.25"></circle>
                                </svg>
                                <div class="button-contact__content">
                                    <svg class="button-contact__icon button-contact__icon--telephone" width="23" height="24"
                                        viewBox="0 0 23 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21.852 17.581l-2.84-1.88a2.614 2.614 0 00-2.745-.083l-2.37 1.11a.788.788 0 01-.763.022c-.128-.066-.267-.135-.413-.207-1.607-.796-4.035-1.998-5.83-5.956a.784.784 0 01.054-.749l1.061-2.126c.495-.793.514-1.79.05-2.602L6.17 1.805a2.6 2.6 0 00-3.4-1.039C.993 1.64.064 3.106.007 5.128c-.01.214-.175 4.27 1.902 8.58 3.499 7.262 10.542 9.316 15.83 9.76.04.004.326.032.737.032 1.064 0 2.96-.185 3.551-1.442l.625-1.065a2.548 2.548 0 00-.8-3.412zm.304 3.121l-.637 1.088c-.546 1.16-2.872 1.192-3.727 1.106-7.471-.628-12.638-3.796-15.355-9.416C.405 9.275.58 5.194.582 5.154v-.007c.05-1.818.849-3.083 2.44-3.865a2.02 2.02 0 012.647.808l1.889 3.305c.358.628.343 1.4-.053 2.037L6.444 9.557c-.237.38-.266.853-.078 1.268 1.88 4.144 4.521 5.452 6.099 6.233.144.071.28.138.405.203.42.216.914.202 1.296-.025l2.37-1.11a2.048 2.048 0 012.159.055l2.84 1.88a1.974 1.974 0 01.62 2.641z"
                                            fill="currentColor" fill-rule="nonzero"></path>
                                    </svg>
                                    <h4 class="button-contact__heading">
                                        <span class="text-white">{{ $data->hame_phone }}</span>
                                    </h4>
                                </div>
                            </a>
                        @endif

                        @if ($data && $data->hame_email)
                            <a class="mt-0 mb-3 overlay-enquiry__button-contact button-contact" href="mailto:{{ $data->hame_email }}" rel="noopener noreferrer" target="_blank">
                                <svg class="overlay-enquiry__dashed-circle dashed-circle" width="42" height="42"
                                    viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="21" cy="21" r="20.5" fill="none" fill-rule="evenodd" stroke="currentColor"
                                        stroke-dasharray="1, 1" stroke-width="0.25"></circle>
                                </svg>
                                <div class="button-contact__content">
                                    {{-- <svg class="button-contact__icon button-contact__icon--telephone" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path style="fill: white" d="M.026 24l11.974-11.607 11.974 11.607h-23.948zm11.964-23.961l-11.99 8.725v12.476l7.352-7.127-5.653-4.113 10.291-7.488 10.309 7.488-5.655 4.108 7.356 7.132v-12.476l-12.01-8.725z"></path>
                                    </svg> --}}
                                    {{-- <svg class="button-contact__icon button-contact__icon--telephone" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M17.218,2.268L2.477,8.388C2.13,8.535,2.164,9.05,2.542,9.134L9.33,10.67l1.535,6.787c0.083,0.377,0.602,0.415,0.745,0.065l6.123-14.74C17.866,2.46,17.539,2.134,17.218,2.268 M3.92,8.641l11.772-4.89L9.535,9.909L3.92,8.641z M11.358,16.078l-1.268-5.613l6.157-6.157L11.358,16.078z"></path>
                                    </svg> --}}
                                    <svg class="svg-icon mt-2" width="48" height="48" viewBox="0 0 24 24" style="fill: white">
                                        <path d="M17.218,2.268L2.477,8.388C2.13,8.535,2.164,9.05,2.542,9.134L9.33,10.67l1.535,6.787c0.083,0.377,0.602,0.415,0.745,0.065l6.123-14.74C17.866,2.46,17.539,2.134,17.218,2.268 M3.92,8.641l11.772-4.89L9.535,9.909L3.92,8.641z M11.358,16.078l-1.268-5.613l6.157-6.157L11.358,16.078z"></path>
                                    </svg>
                                    <h4 class="button-contact__heading p-3" style="word-break: break-word">
                                        <span class="text-white">{{ $data->hame_email }}</span>
                                    </h4>
                                </div>
                            </a>
                        @endif
                    </div>

                    @if ($data && $data->hame_address)
                        <p class="overlay-enquiry__body flex">
                            <img data-src="{{ asset('front-template/assets/img/icons/icon-location.svg') }}" alt="icon location" area-hidden="true" class="block-continent-slider__location-icon lazyloaded" width="10" height="15" src="{{ asset('front-template/assets/img/icons/icon-location.svg') }}">
                            {{ $data->hame_address }}
                        </p>
                    @endif

                    @if ($data && $data->hame_schedule)
                        <p class="overlay-enquiry__body">
                            {{ $data->hame_schedule }}
                        </p>
                    @endif

                    {{-- @foreach ($data as $d)
                        @if ($d->key == 'phone')
                            <a class="mt-0 mb-3 overlay-enquiry__button-contact button-contact" href="tel:+535 345 26 98"rel="noopener noreferrer" target="_blank">
                                <svg class="overlay-enquiry__dashed-circle dashed-circle" width="42" height="42"
                                    viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="21" cy="21" r="20.5" fill="none" fill-rule="evenodd" stroke="currentColor"
                                        stroke-dasharray="1, 1" stroke-width="0.25"></circle>
                                </svg>
                                <div class="button-contact__content">
                                    <svg class="button-contact__icon button-contact__icon--telephone" width="23" height="24"
                                        viewBox="0 0 23 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21.852 17.581l-2.84-1.88a2.614 2.614 0 00-2.745-.083l-2.37 1.11a.788.788 0 01-.763.022c-.128-.066-.267-.135-.413-.207-1.607-.796-4.035-1.998-5.83-5.956a.784.784 0 01.054-.749l1.061-2.126c.495-.793.514-1.79.05-2.602L6.17 1.805a2.6 2.6 0 00-3.4-1.039C.993 1.64.064 3.106.007 5.128c-.01.214-.175 4.27 1.902 8.58 3.499 7.262 10.542 9.316 15.83 9.76.04.004.326.032.737.032 1.064 0 2.96-.185 3.551-1.442l.625-1.065a2.548 2.548 0 00-.8-3.412zm.304 3.121l-.637 1.088c-.546 1.16-2.872 1.192-3.727 1.106-7.471-.628-12.638-3.796-15.355-9.416C.405 9.275.58 5.194.582 5.154v-.007c.05-1.818.849-3.083 2.44-3.865a2.02 2.02 0 012.647.808l1.889 3.305c.358.628.343 1.4-.053 2.037L6.444 9.557c-.237.38-.266.853-.078 1.268 1.88 4.144 4.521 5.452 6.099 6.233.144.071.28.138.405.203.42.216.914.202 1.296-.025l2.37-1.11a2.048 2.048 0 012.159.055l2.84 1.88a1.974 1.974 0 01.62 2.641z"
                                            fill="currentColor" fill-rule="nonzero"></path>
                                    </svg>
                                    <h4 class="button-contact__heading">
                                        <span class="text-white">{{ $d->value }}</span>
                                    </h4>
                                </div>
                            </a>
                        @endif
                    @endforeach --}}
                </div>
                <div class="overlay-enquiry__divider divider">
                    <span class="divider__text">
                        or
                    </span>
                </div>
                <div class="overlay-enquiry__container-form">
                    <span>
                        @foreach ($templates as $template)
                            @if ($template->friendly == 'contact-us-form')
                                {!! $template->subtitle !!}
                            @endif
                        @endforeach
                    </span>
                    <h2 class="overlay-enquiry__heading text-white">
                        @foreach ($templates as $template)
                            @if ($template->friendly == 'contact-us-form')
                                {!! $template->title !!}
                            @endif
                        @endforeach
                    </h2>
                    <p class="overlay-enquiry__body">
                        @foreach ($templates as $template)
                            @if ($template->friendly == 'contact-us-form')
                                {!! $template->content !!}
                            @endif
                        @endforeach
                    </p>

                    <form action="{{ route('front.contact') }}" method="post" class="overlay-enquiry__form js-form form-enquiry">
                        {{ csrf_field() }}

                        <fieldset class="form-enquiry__row">
                            <div class="form-enquiry__input input-container">
                                <input class="input js-input" type="text" id="contact-name" name="name" placeholder="{{ __('Full name') }}" required data-required="">
                                <label class="input-label" for="contact-name">{{ __('Full name') }} ({{ __('Required') }})</label>
                            </div>
                        </fieldset>

                        <fieldset class="form-enquiry__row">
                            <div class="form-enquiry__input input-container">
                                <input class="input js-input" type="email" id="contact-email" name="email" placeholder="{{ __('Email Address') }}" data-required="">
                                <label class="input-label" for="contact-email">{{ __('Email Address') }} ({{ __('Required') }})</label>
                            </div>

                            <div class="form-enquiry__input input-container">
                                <input class="input js-input" type="tel" id="contact-phone" name="phone" placeholder="+">
                                <label class="input-label capitalize" for="contact-phone">{{ __('validation.attributes.phone') }}</label>
                            </div>
                        </fieldset>

                        <div class="form-enquiry__input js-text-area input-container">
                            <textarea class="input input-textarea js-input" name="message"
                                placeholder="{{ __('Contact Message') }}" rows="3"></textarea>
                            <label class="input-label" for="interests">
                                {{ __('Contact Message') }}
                            </label>
                        </div>

                        <fieldset class="form-enquiry__row contact-captcha">
                            <div class="form-enquiry__input input-container {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                <input class="input js-input" type="text" id="contact-captcha" name="captcha" required>
                                <label class="input-label capitalize" for="contact-captcha">Captcha</label>
                                <span>{!! captcha_img('flat') !!}</span>
                            </div>
                        </fieldset>

                        <div class="form-enquiry__error-message js-validation-message error-message">
                            Por favor, rellene los campos obligatorios
                        </div>

                        <div class="form-enquiry__error-message js-error-message error-message">
                            Something went wrong with your submission. Please try again.
                        </div>

                        <button class="button-outline form-enquiry__button-submit js-button-submit">
                            <span class="button-outline__label js-label">
                                {{ __('Send') }}
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>


        <div class="js-success-message overlay-enquiry-success" data-track-id="enquire-success">


            <button class="button button-close overlay-enquiry-success__button-close js-button-close-success">
                <span class="button-close__label js-label" style="opacity: 0; visibility: hidden;">Cerrar</span>
                <div class="button-close__icon js-icon">
                    <canvas class="button-close__icon-background js-icon-background" width="45" height="45"
                        style="transform: matrix(1.1, 0, 0, 1.1, 0, 0); will-change: transform;"></canvas>
                    <span class="button-close__icon-line js-icon-line" style="opacity: 0; visibility: hidden;"></span>
                    <span class="button-close__icon-line js-icon-line" style="opacity: 0; visibility: hidden;"></span>
                </div>
            </button>

            <div class="overlay-enquiry-success__container js-container">

                <div class="overlay-enquiry-success__background js-background">
                </div>

                <div class="overlay-enquiry-success__container-oval">

                    <svg class="overlay-enquiry-success__oval-wrapper oval-wrapper-desktop" width="483" height="483"
                        fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid">

                        <path class="js-oval-inner"
                            d="M241.5 482C374.324 482 482 374.324 482 241.5S374.324 1 241.5 1 1 108.676 1 241.5 108.676 482 241.5 482z"
                            stroke="#fff" stroke-width="2" stroke-dasharray="2 4"></path>
                    </svg>

                    <svg class="overlay-enquiry-success__oval-wrapper oval-wrapper-mobile" width="399" height="399"
                        fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path class="js-oval-inner"
                            d="M199.5 398C309.129 398 398 309.129 398 199.5S309.129 1 199.5 1 1 89.871 1 199.5 89.871 398 199.5 398z"
                            stroke="#fff" stroke-width="2" stroke-dasharray="2 4"></path>
                    </svg>

                    <svg class="overlay-enquiry-success__oval-wrapper oval-wrapper-desktop" width="843" height="843"
                        fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid">

                        <path class="js-oval-outer"
                            d="M421.5 842C653.736 842 842 653.736 842 421.5S653.736 1 421.5 1 1 189.264 1 421.5c0 115.538 46.597 220.192 122.023 296.196C199.207 794.463 304.802 842 421.5 842z"
                            stroke="#fff" stroke-width="2" stroke-dasharray="2 8"></path>
                    </svg>

                    <svg class="overlay-enquiry-success__oval-wrapper oval-wrapper-mobile" width="594" height="594"
                        fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path class="js-oval-outer" opacity=".6"
                            d="M297 593c163.476 0 296-132.524 296-296S460.476 1 297 1 1 133.524 1 297s132.524 296 296 296z"
                            stroke="#fff" stroke-width="2" stroke-dasharray="2 8"></path>
                    </svg>

                </div>

                <div class="overlay-enquiry-success__container-content js-container-content">

                    <img class="overlay-enquiry-success__icon js-envelope-icon lazyloaded"
                        data-src="assets/img/icons/icon-envelope-success.svg"
                        src="assets/img/icons/icon-envelope-success.svg">

                    <h2 class="overlay-enquiry__heading enquiry-success__heading js-heading">
                        Mensaje enviado exitosamente
                    </h2>

                    <p class="overlay-enquiry__body enquiry-success__body js-body">
                        Uno de nuestro comerciales le contactará dentro de las 24 horas
                    </p>
                </div>
            </div>
        </div>
    </aside>
</div>
