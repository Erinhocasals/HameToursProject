@extends('layouts.frontend.global')

@php
    if ($package->showcase && $package->showcase->enabled) $logo = "logo-white.png"; else $logo = "logo-black.png";
@endphp

@prepend('styles')
<link href="{{ asset('front-template/css/socials.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('admin-template/icons/fontawesome-free-6.0.0-beta2-web/css/all.min.css') }}"/>
<style>
    body, .page-lodge {
        background-color: #f1efec !important
    }
    .sticky-cta__container-text .blockOverlay {
        display: none !important;
    }
    .js-sticky-cta .highlighted-example-trip__price-value {
        color: #000;
        text-align: left
    }
</style>
@endprepend

@prepend('scripts')
    <script src="{{ asset('front-template/js/block-itinerary-intro.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/block-itinerary-contributions.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/block-itinerary-ctas.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/block-package-slider.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/block-trail-images.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/block-trail-carousel.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/lodges-overview.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/vendors~mapbox.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/mapbox.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/custom.js') }}"></script>

    <script src="{{ asset('admin-template/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('front-template/js/html2canvas.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $( ".block-lodge-intro__list-highlights.list-highlights li" ).each(function( index ) {
                $(this).addClass('flex items-center justify-left my-2');
                $(this).prepend('<svg class="list-highlights__list-style" width="4" height="14" viewBox="0 0 4 14" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 0v2h1V0h-1zm1 12v2h-1v-2h1zM2 5a2 2 0 110 4 2 2 0 010-4z" fill="#FC6220" fill-rule="nonzero"></path></svg>');
            });
            $(".characteristics p").each(function( index ) {
                $(this).addClass('flex items-center justify-left my-2');
                $(this).prepend('<svg class="list-highlights__list-style" width="4" height="14" viewBox="0 0 4 14" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 0v2h1V0h-1zm1 12v2h-1v-2h1zM2 5a2 2 0 110 4 2 2 0 010-4z" fill="#FC6220" fill-rule="nonzero"></path></svg>');
            });

            $('.js-sticky-cta').block({
                message: '<div class="lds-circle"><div></div></div>',
                css: {
                    backgroundColor: 'transparent',
                    cursor: 'wait',
                    border: 'none'
                }
            });

            axios.post("{{ url('/') }}/price", {}, {
                    params: {
                        priceable_type: 'Package',
                        priceable_id: {{ $package->id }},
                        check_for_listing: false,
                        referral: '{{ $referral }}'
                    }
                }
            )
            .then(function (response) {
                if(response.status == 200) {
                    $('.sticky-cta__container-text, .description-price, .card-price').append(response.data.html);
                    // $('.description-price').append(response.data.html);
                    $('#btn-book, #btn-mobile-book, #btn-desktop-share, #btn-mobile-share').removeClass('hidden');
                }
                $('.js-sticky-cta').unblock();
            })
            .catch(function (error) {
                console.log(error);
                $('.js-sticky-cta').unblock();
            })

            $("#btnShare").on('click', function () {

                $.blockUI({
                    message: '<div class="lds-ring"><div></div><div></div><div></div><div></div></div> <h2>Procesando ...</h2>',
                    css: {
                        backgroundColor: 'transparent',
                        color: 'white',
                        cursor: 'wait',
                        border: 'none'
                    }
                });

                var old = $('.pricing__price').html();
                var tax = $('#tax').val();
                var tax_rate = old * (tax / 100);

                $('.pricing__price').html(parseInt(old) + parseInt(tax_rate));

                setTimeout(() => {
                    html2canvas(document.getElementById('block-description'), {
                            logging: true,
                            profile: true,
                            useCORS: true})
                        .then(function(canvas) {
                            console.log('entro');
                            var data = canvas.toDataURL('image/jpeg', 0.9);
                            var src = encodeURI(data);
                            document.getElementById('image').src = src;

                            $('.pricing__price').html(old);

                            axios.post("{{ url('/') }}/share", {}, {
                                    params: {
                                        shareable_type: 'Package',
                                        shareable_id: {{ $package->id }},
                                        tax: tax
                                    }
                                }
                            )
                            .then(function (response) {
                                if(response.status == 200) {
                                    $('#shareLink').html(response.data);
                                    $('.modal-socials-container, #btnDownload').removeClass('hidden');
                                    $('.modal-share-fb').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=' + response.data);
                                    $('.modal-share-tw').attr('href', 'https://twitter.com/intent/tweet?text=Default+share+text&amp;url=' + response.data);
                                    $('.modal-share-tel').attr('href', 'https://telegram.me/share/url?url=' + response.data);
                                    $('.modal-share-lk').attr('href', 'https://www.linkedin.com/sharing/share-offsite?mini=true&amp;url=' + response.data);
                                    $('.modal-share-wa').attr('href', 'https://wa.me/?text=' + response.data);
                                }
                                $.unblockUI();
                            })
                            .catch(function (error) {
                                console.log(error);
                                $.unblockUI();
                            })
                        })
                        .catch(function (error) {
                            console.log("dio error: " + error);
                            $.unblockUI();
                        });
                }, 1000);
            });

            // Copy to clipboard
            $("#shareLink").on('click', function () {
                if (!navigator.clipboard) {
                    // Clipboard API not available
                    toastr.error('Este navegador no es compatible con la función.', 'Copy To Clipboard');
                    return
                }

                var content = $("#shareLink").html();

                navigator.clipboard.writeText(content)
                    .then(() => {
                    toastr.info('Se ha copiado el texto al clipboard ...', 'Copy To Clipboard')
                })
                    .catch(err => {
                    console.log('Something went wrong', err);
                    toastr.error('Ocurrió un error, intente nuevamente.', 'Copy To Clipboard');
                })
            });

            $("#btnDownload").on('click', function () {
                var a = document.createElement('a');
                a.href = document.getElementById('image').src;
                a.download = "{{ $package->friendly }}.jpeg";
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            });
        })

    </script>
@endprepend

@section('content')
<main id="content" class="content js-main" data-track-id="page">
    {{-- <article class="page-example-trip" data-view="pages/example-trip"> --}}
    <article class="@if ($package->showcase && $package->showcase->enabled) page-lodge @else page-generic @endif" data-view="pages/lodge" >
        {{-- Section Showcase --}}
        @if ($package->showcase && $package->showcase->enabled)
            @include('front.includes.showcase', ['entity' => $package])
        @endif

        {{-- Section Description --}}
        <section class="block-itinerary-intro" id="block-description" data-component="block-itinerary-intro">
            <div class="block-itinerary-intro__container-content">
                <h2 class="block-itinerary-intro__subheading js-subheading text-white">{!! __('Details') !!}</h2>
                <h1 class="block-itinerary-intro__heading js-heading text-white">{!! $package->title !!}</h1>

                <div class="block-itinerary-intro__container-body-map js-container-map">
                    <div class="block-itinerary-intro__container-body">
                        {!! $package->content !!}

                        <div class="block-copy__container mt-5">
                            <div class="block-copy__body description-price">
                            </div>
                        </div>

                        <div class="block-copy__container mt-5">
                            <div class="block-copy__body text-center">
                                {!! $socialShares !!}
                            </div>
                        </div>
                    </div>

                    <div class="block-itinerary-intro__container-map">
                        <div class="block-itinerary-intro__map mapbox" data-component="mapbox"
                             style="width: 100%; height: 100%;"
                             data-geojson='{"type":"FeatureCollection","features":[
                                @foreach ($package->entities as $entity)
                                    @if ($entity->latitude && $entity->longitude)
                                        {"type":"Feature","geometry":{"type":"Point","coordinates":[{{ $entity->latitude }}, {{ $entity->longitude }}]},"properties":{"title":"{{ $entity->title }}"}} @if (!$loop->last),@endif
                                    @endif
                                @endforeach
                             ]}'>
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
                </div>

                <div class="block-itinerary-intro__container-lists">
                    <section class="block-itinerary-intro__list-highlights js-list list-highlights">
                        <h3 class="list-highlights__subheading text-white">{!! __('Starred') !!}</h3>
                        <h2 class="list-highlights__heading text-white">{{ __('Characteristics') }}</h2>

                        <ul class="characteristics list-highlights__list">
                            {!! $package->characteristics !!}
                        </ul>
                    </section>

                    <section class="block-itinerary-intro__list-highlights js-list list-highlights">
                        <h3 class="list-highlights__subheading text-white">{{ __('Details') }}</h3>
                        <h2 class="list-highlights__heading text-white">{{ __('Package Includes') }}</h2>

                        <ul class="characteristics list-highlights__list">
                            {!! $package->includes !!}
                        </ul>
                    </section>
                </div>
            </div>

            <div class="block-itinerary-intro__slider-media js-slider slider-media">
                <div class="slider-media__container js-container" data-custom-cursor="drag">
                    <div class="highlighted-example-trips-summary">
                        <h3 class="highlighted-example-trips-summary__headline text-white">{!! $galleryTemplate->subtitle !!}</h3>
                        <h2 class="highlighted-example-trips-summary__heading"><em>{!! $galleryTemplate->title !!}</em></h2>
                        <p class="highlighted-example-trips-summary__description">{!! $galleryTemplate->content !!}</p>
                    </div>
                    <ul class="slider-media__list js-list">
                        @foreach ($package->definitions as $definition)
                            <li class="slider-media__list-item slider-media__list-item--portrait-image js-list-item">
                                <div class="slider-media__content">
                                    <div class="responsive-image responsive-image--object-fit slider-media__image js-image">
                                        <picture class="responsive-image__picture ">
                                            @if (isset($definition->image))
                                                <img class="responsive-image__img lazyload" data-src="{{ asset('storage/' . $definition->image->url) }}" alt="{{ $definition->title }}">
                                            @endif
                                        </picture>
                                    </div>
                                    <span class="slider-media__label-icon label-icon flex">
                                    <svg class="label-icon__icon" width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path
                                            d="M0 5.942C0 3.052 2.243.7 5 .7s5 2.352 5 5.242c0 3.497-3.978 8.52-5.004 9.758C3.963 14.496 0 9.633 0 5.942zm2.606-.488c0-1.389 1.082-2.518 2.41-2.518 1.329 0 2.41 1.13 2.41 2.518 0 1.389-1.081 2.519-2.41 2.519-1.328 0-2.41-1.13-2.41-2.519z"
                                            fill="currentColor" fill-rule="evenodd"/></svg>
                                        <span class="label-icon__label">
                                            @if ($definition->image)
                                                {{ $definition->image->tag }}
                                            @endif
                                        </span>
                                    </span>
                                </div>
                            </li>
                            @if ($definition->showcase)
                                @foreach ($definition->showcase->images as $image)
                                    <li class="slider-media__list-item slider-media__list-item--full-width js-list-item">
                                        <div class="slider-media__content">
                                            <div class="responsive-image responsive-image--object-fit slider-media__image js-image">
                                                <picture class="responsive-image__picture ">
                                                    <img class="responsive-image__img lazyload"
                                                        data-src="{{ asset('storage/' . $image->url) }}"
                                                        alt="{{ $image->tag }}}">
                                                </picture>
                                            </div>
                                            <span class="slider-media__label-icon label-icon flex">
                                                <svg class="label-icon__icon" width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path
                                                    d="M0 5.942C0 3.052 2.243.7 5 .7s5 2.352 5 5.242c0 3.497-3.978 8.52-5.004 9.758C3.963 14.496 0 9.633 0 5.942zm2.606-.488c0-1.389 1.082-2.518 2.41-2.518 1.329 0 2.41 1.13 2.41 2.518 0 1.389-1.081 2.519-2.41 2.519-1.328 0-2.41-1.13-2.41-2.519z"
                                                    fill="currentColor" fill-rule="evenodd"/></svg>
                                                <span class="label-icon__label">
                                                    {{ $image->tag }}
                                                </span>
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        @endforeach
                    </ul>
                </div>

                <div class="slider-media__container-buttons">
                    <button class="slider-media__button slider-media__button--prev js-button-prev  button-slider--flipped button-slider" aria-label="Previous">
                        <svg class="button-slider__dashed-circle dashed-circle" width="42" height="42"
                             viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="21" cy="21" r="20.5" fill="none" fill-rule="evenodd"
                                    stroke="currentColor" stroke-dasharray="2, 2" stroke-width="1"/>
                        </svg>
                        <svg class="button-slider__icon" width="7" height="10" viewBox="0 0 7 10"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.243.757L5.485 5 1.243 9.243" stroke="currentColor" stroke-width="1.5"
                                  fill="none" fill-rule="evenodd"/>
                        </svg>
                    </button>

                    <button class="slider-media__button slider-media__button--next js-button-next button-slider" aria-label="Next">
                        <svg class="button-slider__dashed-circle dashed-circle" width="42" height="42"
                             viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="21" cy="21" r="20.5" fill="none" fill-rule="evenodd"
                                    stroke="currentColor" stroke-dasharray="2, 2" stroke-width="1"/>
                        </svg>

                        <svg class="button-slider__icon" width="7" height="10" viewBox="0 0 7 10"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.243.757L5.485 5 1.243 9.243" stroke="currentColor" stroke-width="1.5"
                                  fill="none" fill-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            </div>
        </section>

        {{-- Section Texts --}}
        <section class="block-itinerary-contributions" data-component="block-itinerary-contributions">
            <div class="block-itinerary-contributions__container">
                <h2 class="block-itinerary-intro__subheading js-subheading">{!! $textsTemplate->subtitle !!}</h2>
                <h2 class="block-itinerary-contributions__heading js-heading mb-10">{!! $textsTemplate->title !!}</h2>
                <p class="highlighted-example-trips-summary__description">{!! $textsTemplate->content !!}</p>

                <ul class="block-itinerary-contributions__list pt-20">
                    @foreach ($package->enabledTexts() as $text)
                        <li class="block-itinerary-contributions__list-item js-list-item">
                            @if ($text->image)
                                <object class="outline-svg w-full h-24" data="{{ asset('storage/' . $text->image->url) }}" type="image/svg+xml"></object>
                            @endif
                            <h3 class="block-itinerary-contributions__subheading">
                                {!! $text->title !!}
                            </h3>
                            <p class="block-itinerary-contributions__body-item">
                                {!! $text->content !!}
                            </p>
                            <svg class="block-itinerary-contributions__divider" width="116" height="4"
                                viewBox="0 0 116 4" xmlns="http://www.w3.org/2000/svg">
                                <path d="M116 1.5h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0h-2v1h2v-1zm-6 0H6v1h2v-1zm-6 1H0v-1h2v1zM60 2a2 2 0 11-4 0 2 2 0 014 0z"
                                    fill="#FC6220" fill-rule="nonzero"/>
                            </svg>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        <div class="block-itinerary" style="background: #f1efeb;">
            <div class="block-itinerary__cta">
                <svg class="block-itinerary__dashed-circle dashed-circle" width="42" height="42" viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="21" cy="21" r="20.5" fill="none" fill-rule="evenodd" stroke="currentColor" stroke-dasharray="1, 2" stroke-width="0.5"/>
                </svg>
                {{ __('Package Adventure Begins') }}
            </div>

            @php
                $position = 0;
            @endphp

            @foreach ($package->times as $time)
                @if ($time->style == 0)
                    @foreach ($time->contents as $content)
                        @php
                            $trailPos = $position++ % 2 == 0 ? "left" : "right";
                        @endphp
                        <section class=" block-trail-images block-trail-images--{{  $trailPos }}" data-component="block-trail-images">
                            <div class="block-trail-images__container-trails js-trail">
                                <svg class="block-trail-images__trail-mobile" width="192" height="872" viewBox="0 0 192 872"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                        <path class="block-trail-images__dash js-trail-dash-mobile"
                                            d="M111 25C59.667 71.667 23.667 130.333 3 201c-20.504 70.109 142.338 284.589 180 380 45 114-117.623 226.683-99 290"
                                            stroke="#283A2C" stroke-dasharray="2,4"/>
                                        <path class="block-trail-images__path js-trail-path-mobile"
                                            d="M112 1.195h37v5.989H74V13.4h75v5.178H74V25h37C59.667 71.667 23.667 130.333 3 201c-20.504 70.109 142.338 284.589 180 380 45 114-117.623 226.683-99 290"
                                            stroke="#FC6220"/>
                                    </g>
                                </svg>
                                <svg class="block-trail-images__trail-desktop" width="558" height="763" viewBox="0 0 558 763" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                        <path class="block-trail-images__dash js-trail-dash-desktop"
                                            d="M518.825 29.6C442.388 225.446 147.888 174.331 38.257 371.737c-54.752 98.589-49.84 228.672 14.735 390.25"
                                            stroke="#283A2C" stroke-dasharray="2,4"/>
                                        <path class="block-trail-images__path js-trail-path-desktop"
                                            d="M517.5 1.194H555V5.09h-75v5.69h77v6.14h-77v4.56h77V26h-77v3.6c25.883-.4 38.825-.4 38.825 0-76.437 195.846-370.937 144.731-480.568 342.137C-16.458 470.26-11.59 600.233 52.86 761.66"
                                            stroke="#FC6220"/>
                                    </g>
                                </svg>
                                <span class="block-trail-images__dot js-trail-dot"></span>
                            </div>
                            <div class="block-trail-images__container-copy">
                                <div class="block-trail-carousel__container-days text-center w-1/12">
                                    <div class="block-trail-carousel__subheading">
                                        {{ $time->definition }}
                                    </div>
                                    <div class="block-trail-carousel__days h-auto">
                                        <svg class="block-trail-carousel__dashed-circle-days dashed-circle" width="42" height="42" viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="21" cy="21" r="20.5" fill="none" fill-rule="evenodd" stroke="currentColor" stroke-dasharray="1, 2" stroke-width="0.5"></circle>
                                        </svg>
                                        <span class="block-trail-carousel__day">
                                            {{ $time->time }}
                                        </span>
                                    </div>
                                </div>
                                <div class="block-trail-images__container-heading">
                                    <h2 class="block-trail-images__heading js-heading">
                                        {{ $content->contentable->title }}
                                    </h2>
                                </div>
                                <div class="block-trail-images__body js-body">
                                    {{-- @if ($content->contentable->intro)
                                        {!! $content->contentable->intro->content !!}
                                    @elseif ($content->contentable->showcase)
                                        {!! $content->contentable->showcase->content !!}
                                    @endif --}}
                                    {!! $time->content !!}
                                </div>
                            </div>
                            <div class="block-trail-images__image-landscape js-container-image-landscape">
                                <div class="responsive-image responsive-image--object-fit">
                                    <picture class="responsive-image__picture ">
                                        <img class="responsive-image__img js-image-landscape lazyload"
                                            data-src="{{ asset('storage/' . ($content->contentable->showcase ? $content->contentable->showcase->images[0]->url : $content->contentable->image->url)) }}"
                                            alt="{{ $content->contentable->title }}">
                                    </picture>
                                </div>
                            </div>
                        </section>
                    @endforeach
                @else
                    @php
                        $trailPos = $position++ % 2 == 0 ? "left" : "right";
                    @endphp
                    <div class=" block-trail-carousel block-trail-carousel--{{  $trailPos }}" data-component="block-trail-carousel">
                        <div class="block-trail-carousel__body js-body">
                            {!! $time->content !!}
                            {{-- <p>Este sitio es hogar de una gran biodiversidad submarina, comparada con la del Mar de Cortés, conocido como el “Acuario del mundo”</p> --}}
                        </div>
                        <div class="block-trail-carousel__container-days-trail js-container-trail">
                            <div class="block-trail-carousel__container-days">
                                <div class="block-trail-carousel__subheading">
                                    {{ $time->definition }}
                                </div>
                                <div class="block-trail-carousel__days h-auto">
                                    <svg class="block-trail-carousel__dashed-circle-days dashed-circle" width="42" height="42" viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="21" cy="21" r="20.5" fill="none" fill-rule="evenodd" stroke="currentColor" stroke-dasharray="1, 2" stroke-width="0.5"/>
                                    </svg>
                                    <span class="block-trail-carousel__day-one">
                                        {{ $time->time }}
                                    </span>
                                </div>
                            </div>
                            <div class="block-trail-carousel__container-trails js-trail">
                                <svg class="block-trail-carousel__trail-mobile" width="83" height="159"
                                    viewBox="0 0 83 159" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                        <path class="block-trail-carousel__dash js-trail-dash-mobile"
                                            d="M.388 1.18C52.729 2.83 79.95 15.948 82.05 40.533 85.218 77.626 46 69.5 22.87 94.968 10.828 108.227 14.205 129.238 33 158"
                                            stroke="#283A2C" stroke-dasharray="2,4"/>

                                        <path class="block-trail-carousel__path js-trail-path-mobile"
                                            d="M.388 1.18C52.729 2.83 79.95 15.948 82.05 40.533 85.218 77.626 46 69.5 22.87 94.968 10.828 108.227 14.205 129.238 33 158"
                                            stroke="#FC6220"/>
                                    </g>
                                </svg>
                                <svg class="block-trail-carousel__trail-desktop" width="365" height="294"
                                    viewBox="0 0 365 294" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                        <path class="block-trail-carousel__dash js-trail-dash-desktop"
                                            d="M353 1c34.802 131.007-14.246 208.285-147.143 231.834C72.959 256.384 4.674 276.474 1 293.104"
                                            stroke="#283A2C" stroke-dasharray="2,4"/>

                                        <path class="block-trail-carousel__path js-trail-path-desktop"
                                            d="M353 1c34.802 131.007-14.246 208.285-147.143 231.834C72.959 256.384 4.674 276.474 1 293.104"
                                            stroke="#FC6220"/>
                                    </g>
                                </svg>
                                <span class="block-trail-carousel__dot js-trail-dot"></span>
                            </div>
                        </div>

                        <div class="js-lodges-overview lodges-overview" data-component="lodges-overview">
                            <div class="lodges-overview__subheading-large">
                                {{ __('Experiences') }}
                                {{-- <h2 class="block-trail-images__heading js-heading">
                                    {{ $content->contentable->title }}
                                </h2> --}}
                            </div>

                            <div class="lodges-overview__container-carousels js-container-carousels">
                                @foreach ($time->contents as $content)
                                    <div class="lodges-overview__carousel-stacked-images js-carousel-stacked-images carousel-stacked-images">
                                        <ul class="carousel-stacked-images__list js-list">
                                            @if ($content->contentable->showcase)
                                                @foreach ($content->contentable->showcase->images as $image)
                                                    <li class="carousel-stacked-images__list-item js-list-item" data-asset="{{ asset('storage/' . $image->url) }}">
                                                        <div class="responsive-image responsive-image--object-fit responsive-image--parallax ">
                                                            <picture class="responsive-image__picture " data-component="parallax"
                                                                    data-parallax-offset="100" data-parallax-direction="-1"
                                                                    data-parallax-start="-50">
                                                                <img class="responsive-image__img lazyload"
                                                                    data-src="{{ asset('storage/' . $image->url) }}"
                                                                    alt="{{ $image->tag }}">
                                                            </picture>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li class="carousel-stacked-images__list-item js-list-item" data-asset="{{ asset('storage/' . $content->contentable->image->url) }}">
                                                    <div class="responsive-image responsive-image--object-fit responsive-image--parallax ">
                                                        <picture class="responsive-image__picture " data-component="parallax"
                                                                data-parallax-offset="100" data-parallax-direction="-1"
                                                                data-parallax-start="-50">
                                                            <img class="responsive-image__img lazyload"
                                                                data-src="{{ asset('storage/' . $content->contentable->image->url) }}"
                                                                alt="{{ $content->contentable->title }}">
                                                        </picture>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                        <div class="carousel-stacked-images__container-buttons">
                                            <button class="carousel-stacked-images__button js-button-prev  button-slider--flipped button-slider" aria-label="Previous">
                                                <svg class="button-slider__dashed-circle dashed-circle" width="42"
                                                    height="42" viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="21" cy="21" r="20.5" fill="none" fill-rule="evenodd"
                                                            stroke="currentColor" stroke-dasharray="2, 2" stroke-width="1"/>
                                                </svg>

                                                <svg class="button-slider__icon" width="7" height="10" viewBox="0 0 7 10"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.243.757L5.485 5 1.243 9.243" stroke="currentColor"
                                                        stroke-width="1.5" fill="none" fill-rule="evenodd"/>
                                                </svg>
                                            </button>

                                            <div class="scroll-indicator carousel-stacked-images__scroll-indicator js-scroll-indicator">
                                                <span class="scroll-indicator__background js-background"></span>
                                                <span class="scroll-indicator__highlight js-highlight"></span>
                                            </div>

                                            <button class="carousel-stacked-images__button js-button-next button-slider" aria-label="Next">
                                                <svg class="button-slider__dashed-circle dashed-circle" width="42"
                                                    height="42" viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="21" cy="21" r="20.5" fill="none" fill-rule="evenodd"
                                                            stroke="currentColor" stroke-dasharray="2, 2" stroke-width="1"/>
                                                </svg>

                                                <svg class="button-slider__icon" width="7" height="10" viewBox="0 0 7 10"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.243.757L5.485 5 1.243 9.243" stroke="currentColor"
                                                        stroke-width="1.5" fill="none" fill-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach ($time->contents as $content)
                                    <div class="lodges-overview__container-copy-overlay js-copy-overlay">
                                        @if ($content->isEntity() && $content->contentable->category->svg)
                                            <object class="outline-svg h-16 inline" data="{{ asset('storage/' . $content->contentable->category->svg) }}" type="image/svg+xml" style="filter: brightness(0) invert(1);">
                                                <img class="h-16" src="{{ asset('storage/' . $content->contentable->category->svg) }}">
                                            </object>
                                        @else
                                            @if ($content->contentable->showcase && $content->contentable->showcase->svg)
                                                <object class="outline-svg h-16 inline" data="{{ asset('storage/' . $content->contentable->showcase->svg) }}" type="image/svg+xml" style="filter: brightness(0) invert(1);">
                                                    <img class="h-16" src="{{ asset('storage/' . $content->contentable->showcase->svg) }}">
                                                </object>
                                            @endif
                                        @endif
                                        @if ($content->contentable->category)
                                            <div class="lodges-overview__subheading">
                                                <span>{!! $content->contentable->category->title !!}</span>
                                            </div>
                                        @endif
                                        <div class="lodges-overview__heading js-heading">
                                            {!! $content->contentable->title !!}
                                        </div>
                                        <a href="@if (str_contains($content->contentable_type, "Entity")) {{ route('front.entity', ['package' => $package->friendly, 'friendly' => $content->contentable->friendly]) }} @else {{ route('front.category', ['friendly' => $content->contentable->friendly]) }} @endif" class="button-outline lodges-overview__button-details">
                                            <span class="button-outline__label js-label">
                                                {{ __('Details') }}
                                            </span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="lodges-overview__slider-text js-slider-text slider-text">
                                <ul class="slider-text__list js-list">
                                    @foreach ($time->contents as $content)
                                        <li class="slider-text__list-item js-list-item">
                                            <em>{!! $content->contentable->title !!}</em>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="lodges-overview__container-body js-container-body">
                                @foreach ($time->contents as $content)
                                    <div class="lodges-overview__body js-body">
                                        <div>
                                            {!! $content->contentable->summary !!}
                                        </div>
                                        <a href="entity.html" class="button-outline button-outline--inverted lodges-overview__button-details">
                                            <span class="button-outline__label js-label">
                                                {{ __('Details') }}
                                            </span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <section class=" block-itinerary-ctas js-block-itinerary-ctas" data-component="block-itinerary-ctas">
                <div class="block-itinerary-ctas__container-trails js-trail">
                    <svg class="block-itinerary-ctas__trail-mobile" width="2" height="178" viewBox="0 0 2 178"
                         xmlns="http://www.w3.org/2000/svg">
                        <g fill="none" fill-rule="evenodd">
                            <path class="block-itinerary-ctas__dash js-trail-dash-mobile" d="M1 .217v177.008"
                                  stroke="#283A2C" stroke-dasharray="2,4"/>

                            <path class="block-itinerary-ctas__path js-trail-path-mobile" d="M1 .217v177.008"
                                  stroke="#FC6220"/>
                        </g>
                    </svg>
                    <svg class="block-itinerary-ctas__trail-desktop" width="3" height="300" viewBox="0 0 3 300"
                         xmlns="http://www.w3.org/2000/svg">
                        <g fill="none" fill-rule="evenodd">
                            <path class="block-itinerary-ctas__dash js-trail-dash-desktop" d="M1.5 0v300"
                                  stroke="#283A2C" stroke-dasharray="2,4"/>

                            <path class="block-itinerary-ctas__path js-trail-path-desktop" d="M1.5 0v300"
                                  stroke="#FC6220" stroke-width="1.5"/>
                        </g>
                    </svg>
                    <span class="block-itinerary-ctas__dot js-trail-dot"></span>
                </div>

                <div class="block-itinerary-ctas__container-icon js-icon">
                    <svg class="block-itinerary-ctas__dashed-circle dashed-circle" width="42" height="42"
                         viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="21" cy="21" r="20.5" fill="none" fill-rule="evenodd" stroke="currentColor"
                                stroke-dasharray="1, 2" stroke-width="0.5"/>
                    </svg>

                    <svg class=" " width="38" height="38" viewBox="0 0 38 38"
                         xmlns="http://www.w3.org/2000/svg">
                        <g fill="currentColor" fill-rule="evenodd">
                            <path d="M24.79 18.082c-.099-.049-.197-.098-.295-.098-.933-.294-1.914-.638-2.846-.932-.05 0-.098-.05-.196-.098a.331.331 0 01-.197-.295c-.049-.245-.098-.54-.147-.785a5.136 5.136 0 00-.196-.835c-.05-.245-.197-.441-.344-.638-.049-.098-.147-.147-.294-.147a.413.413 0 00-.344.196c-.049.148-.098.295-.098.491-.049.197 0 .442.05.638.097.442.147.884.245 1.375.049.147 0 .245-.098.392-.197.197-.393.393-.638.59-.59.54-1.178 1.128-1.767 1.668-.098.098-.196.196-.245.344a.527.527 0 00.049.54c0 .049.049.049.049.098.098.147.196.196.343.098.148-.05.246-.147.393-.196.49-.295 1.03-.59 1.521-.933.196-.098.344-.196.54-.245.098-.05.147-.05.245-.099v.05l.442 1.914v.049c-.147.098-.295.245-.442.343-.098.099-.196.197-.245.344-.05.147 0 .294.049.393.049.049.098.098.196.098h.147a29.986 29.986 0 002.012-.491c.05 0 .098-.05.197-.05.098-.048.147-.097.147-.195 0-.099 0-.197-.05-.295 0-.098-.097-.196-.245-.245l-.589-.148c-.049 0-.098 0-.147-.049-.049 0-.049 0-.049-.049-.049-.196-.049-.442-.098-.638-.049-.442-.098-.834-.147-1.276v-.05c.098-.048.196-.048.294-.097.246-.05.491-.05.687 0 .638.049 1.227.098 1.865.147h.196c.147 0 .196-.05.196-.196.099-.099.099-.246.05-.442-.05-.098-.099-.196-.197-.246zM15.073 22.941c-.245-.147-.54-.098-.687.148-.147.245-.098.54.148.687l4.661 3.092c.098.05.197.098.246.098.147 0 .294-.098.392-.245.196-.246.098-.54-.098-.687l-4.662-3.093zM13.7 25.002c-.246-.147-.54-.098-.687.148-.147.245-.098.54.147.687l4.661 3.092c.099.05.197.098.246.098.147 0 .294-.098.392-.245.197-.246.148-.54-.098-.687L13.7 25.002zM8.253 7.726c-.147 0-.246.049-.393.049H7.713c-.049-.147-.147-.245-.196-.393-.147-.245-.246-.49-.393-.785v-.05c.05-.048.098-.097.147-.097a.791.791 0 01.442-.148c.393-.098.834-.196 1.227-.294.049 0 .098-.05.147-.05.098-.048.098-.097.098-.146a.53.53 0 00-.147-.344c-.05-.049-.098-.098-.196-.098H6.486c-.098 0-.147-.05-.196-.147-.098-.148-.147-.295-.245-.491-.098-.147-.197-.344-.295-.491a1.147 1.147 0 00-.343-.344c-.05-.049-.147-.049-.196-.049-.099.05-.148.099-.148.197s0 .245.05.343c.048.148.098.295.147.393.147.294.294.54.441.834.05.099.05.197 0 .246-.098.147-.196.343-.294.49-.246.491-.54.982-.785 1.473-.05.098-.098.147-.098.245 0 .148.049.246.147.344l.049.05c.098.097.147.097.245 0l.196-.197c.246-.295.54-.59.786-.933l.294-.294c.049-.05.098-.05.147-.098v.049c.246.392.49.736.687 1.129v.049c-.049.098-.147.196-.196.294-.05.098-.098.147-.098.246 0 .098.049.196.098.245.049.049.098.049.147 0 .05 0 .05 0 .098-.05l1.178-.735c.049 0 .049-.05.098-.05.05-.049.098-.098.05-.147.048 0 0-.049 0-.147-.05-.049-.1-.098-.197-.098z"
                                  fill-rule="nonzero"/>
                            <path d="M11.442 16.954L4.77 27.016a.522.522 0 00-.05.392c.05.148.1.246.197.295l14.427 9.522c.098.049.196.098.245.098.147 0 .294-.098.392-.245l10.01-15.216 3.14.834h.148c.098 0 .147 0 .245-.049.099-.049.197-.196.246-.294l3.435-13.007c.049-.147 0-.245-.05-.393-.048-.098-.196-.196-.294-.245L4.082.02c-.147-.049-.245 0-.393.05-.098.048-.196.196-.245.294L.01 13.37c-.049.294.098.54.393.638l11.04 2.945zM5.85 27.163L18.656 7.677l13.64 8.982L19.49 36.096 5.849 27.163zm27.135-5.497l-2.405-.687 2.797-4.222a.522.522 0 00.05-.392c-.05-.147-.099-.246-.197-.295l-4.122-2.7 2.748.737h.147c.197 0 .393-.147.491-.344.05-.245-.098-.54-.343-.589l-5.545-1.472-3.533-2.307 9.47 2.503h.147c.197 0 .393-.147.491-.343.05-.246-.098-.54-.343-.59l-12.17-3.239h-.098l-1.766-1.129c-.246-.147-.54-.098-.687.148l-.196.245-2.846-.736c-.246-.05-.54.098-.59.343-.048.246.099.54.344.59l2.552.687-.736 1.128-2.11-.589c-.246-.049-.54.099-.59.344-.048.245.1.54.344.589l1.816.49-.785 1.228-1.423-.344c-.245-.049-.54.098-.589.344-.049.245.098.54.344.589l1.03.294-.785 1.178-.589-.196c-.245-.05-.54.098-.589.344-.049.245.098.54.344.589l.294.098-1.374 2.061-2.355-.638 3.19-12.074L36.172 9.59l-3.19 12.075zm-21.1-18.553l-3.19 12.074-7.556-2.013L4.328 1.1l7.556 2.013z"/>
                            <path d="M3.69 10.377c-.246-.05-.54.098-.59.343-.048.246.099.54.344.59l3.68.98h.148c.196 0 .392-.146.49-.343a.638.638 0 00-.392-.589l-3.68-.981z"
                                  fill-rule="nonzero"/>
                        </g>
                    </svg>
                </div>

                <h2 class="block-itinerary-ctas__heading js-heading text-white">
                    {{ __('Book Now') }}
                </h2>

                <div class="block-itinerary-ctas__container-ctas pb-20">
                    <div class="block-itinerary-ctas__container-cta js-container-cta">
                        <div class="block-itinerary-ctas__text pb-3">
                            {!! $package->title !!}
                        </div>

                        <div class="block-copy__container mt-5">
                            <div class="block-copy__body card-price">
                            </div>
                        </div>

                        {{-- <button data-overlay='{
                                "type": "enquire",
                                "callLabel": "Llámanos",
                                "leftColumnHeading": "Contacta a un comercial",
                                "leftColumnSubheading": "",
                                "rightColumnHeading": "Contactanos enviandonos un mensaje",
                                "rightColumnSubheading": "Siempre respondemos en 24 horas.",
                                "errorMessage": "Something went wrong with your submission. Please try again.",
                                "validationMessage": "Please fill in all the required fields",
                                "successMessageHeading": "Enquiry sent successfully",
                                "successMessageBody": "Uno de nuestros comerciales le respondera en menos de 24 horas",
                                "phoneNumber": "44366546456456",
                                "onlineLabel": "We&#039;re online now",
                                "emailLabel": "Enviar",
                                "emailAddress": "",
                                "newsletterOptInLabel": "",
                                "gdprCheckboxLabel": ""
                            }' class="button-outline block-itinerary-ctas__button"
                        >
                            <span class="button-outline__label js-label">
                                Reservar Ahora
                            </span>
                        </button> --}}
                    </div>
                    <div class="block-itinerary-ctas__divider js-divider divider">
                        <span class="divider__text">
                            o
                        </span>
                    </div>
                    <div class="block-itinerary-ctas__container-cta js-container-cta">
                        <div class="block-itinerary-ctas__text">
                            Llámanos
                            @foreach ($data as $phone)
                                <a class="block-itinerary-ctas__link" href="tel:{{ $phone->value }}" rel="noopener noreferrer" aria-label="Call Us">
                                    {{ $phone->value }}
                                </a>

                                {{-- <a href="tel:{{ $phone->value }}"
                                    class="button-outline mr-1">
                                    <span class="button-outline__label js-label sticky-cta__button-desktop">{{ __('Contact') }}</span>
                                    <svg class="svg-icon sticky-cta__button-mobile border-none ml-0" viewBox="-5 -9 30 30">
                                        <path fill="currentColor" d="M13.372,1.781H6.628c-0.696,0-1.265,0.569-1.265,1.265v13.91c0,0.695,0.569,1.265,1.265,1.265h6.744c0.695,0,1.265-0.569,1.265-1.265V3.045C14.637,2.35,14.067,1.781,13.372,1.781 M13.794,16.955c0,0.228-0.194,0.421-0.422,0.421H6.628c-0.228,0-0.421-0.193-0.421-0.421v-0.843h7.587V16.955z M13.794,15.269H6.207V4.731h7.587V15.269z M13.794,3.888H6.207V3.045c0-0.228,0.194-0.421,0.421-0.421h6.744c0.228,0,0.422,0.194,0.422,0.421V3.888z"></path>
                                    </svg>
                                </a> --}}
                            @endforeach
                        </div>
                        <div class="responsive-image responsive-image--object-fit block-itinerary-ctas__profile">
                            <picture class="responsive-image__picture ">
                                <img class="responsive-image__img lazyload"
                                     data-src="{{ asset('front-template/assets/img/logo-cyan.png') }}"
                                     alt="HameTours">
                            </picture>
                        </div>
                        <p class="block-itinerary-ctas__body">
                            Respondemos siempre dentro de las 24 horas.
                        </p>
                    </div>
                </div>

            </section>
        </div>

        {{-- @livewire('package-list', ['packages' => $package->similarPackages()]) --}}

    </article>
</main>
@endsection

@section('sticky-reservation')
<div class="js-sticky-cta sticky-cta">
    <div class="sticky-cta__container-grid items-center">

        <div class="sticky-cta__container-text">
            <div class="sticky-cta__text">
                <p>{!! $package->title !!}</p>
            </div>
        </div>

        <div class="sticky-cta__cta-phone mr-3">
            @foreach ($data as $phone)
                <span>{{ $phone->title }}</span><br>
                <a class="sticky-cta__text-numbers" href="tel:{{ $phone->value }}" rel="noopener noreferrer" aria-label="Call Us">
                    {{ $phone->value }}
                </a><br>
            @endforeach
        </div>

        @foreach ($data as $phone)
            <a href="tel:{{ $phone->value }}"
                class="button-outline mr-1">
                <span class="button-outline__label js-label sticky-cta__button-desktop">{{ __('Contact') }}</span>
                <svg class="svg-icon sticky-cta__button-mobile border-none ml-0" viewBox="-5 -9 30 30">
                    <path fill="currentColor" d="M13.372,1.781H6.628c-0.696,0-1.265,0.569-1.265,1.265v13.91c0,0.695,0.569,1.265,1.265,1.265h6.744c0.695,0,1.265-0.569,1.265-1.265V3.045C14.637,2.35,14.067,1.781,13.372,1.781 M13.794,16.955c0,0.228-0.194,0.421-0.422,0.421H6.628c-0.228,0-0.421-0.193-0.421-0.421v-0.843h7.587V16.955z M13.794,15.269H6.207V4.731h7.587V15.269z M13.794,3.888H6.207V3.045c0-0.228,0.194-0.421,0.421-0.421h6.744c0.228,0,0.422,0.194,0.422,0.421V3.888z"></path>
                </svg>
            </a>
        @endforeach

        {{-- @auth --}}
            <button
                id="btn-book"
                data-title="{!! $package->title !!}"
                data-type="package"
                data-id="{{ $package->id }}"
                {{-- data-parent-id="@if ($category) {{ $category->id }} @elseif ($package) {{ $package->id }} @endif"
                data-parent-type="@if ($category) Category @elseif ($package) Package @endif" --}}
                class="hidden btn-add-to-cart button-outline sticky-cta__button-desktop">
                <img class="hidden" src="@if ($package->image) {{ asset('storage/' . $package->image->url) }} @else https://ui-avatars.com/api/?name={{ $package->title }}&color=CCCCCC&background=000000 @endif">
                <span class="button-outline__label js-label sticky-cta__button-desktop" id="AddToCartText">{{ __('Book Now') }}</span>
                <svg class="svg-icon sticky-cta__button-mobile border-none ml-0" viewBox="-5 -5 30 30">
                    <path fill="currentColor" d="M14.467,1.771H5.533c-0.258,0-0.47,0.211-0.47,0.47v15.516c0,0.414,0.504,0.634,0.802,0.331L10,13.955l4.136,4.133c0.241,0.241,0.802,0.169,0.802-0.331V2.241C14.938,1.982,14.726,1.771,14.467,1.771 M13.997,16.621l-3.665-3.662c-0.186-0.186-0.479-0.186-0.664,0l-3.666,3.662V2.711h7.994V16.621z"></path>
                </svg>
            </button>
        {{-- @endauth --}}

        <input type="hidden" id="referral" value="{{ $referral }}">

        @hasrole('comercial')
            <button data-bs-toggle="modal" data-bs-target="#modal-reservation" id="btn-desktop-share"
                class="hidden button-outline ml-1">
                <span class="button-outline__label js-label sticky-cta__button-desktop">{{ __('Trade') }}</span>
                <svg class="svg-icon sticky-cta__button-mobile border-none ml-0" viewBox="-5 -5 30 30">
                    <path fill="currentColor" d="M16.469,8.924l-2.414,2.413c-0.156,0.156-0.408,0.156-0.564,0c-0.156-0.155-0.156-0.408,0-0.563l2.414-2.414c1.175-1.175,1.175-3.087,0-4.262c-0.57-0.569-1.326-0.883-2.132-0.883s-1.562,0.313-2.132,0.883L9.227,6.511c-1.175,1.175-1.175,3.087,0,4.263c0.288,0.288,0.624,0.511,0.997,0.662c0.204,0.083,0.303,0.315,0.22,0.52c-0.171,0.422-0.643,0.17-0.52,0.22c-0.473-0.191-0.898-0.474-1.262-0.838c-1.487-1.485-1.487-3.904,0-5.391l2.414-2.413c0.72-0.72,1.678-1.117,2.696-1.117s1.976,0.396,2.696,1.117C17.955,5.02,17.955,7.438,16.469,8.924 M10.076,7.825c-0.205-0.083-0.437,0.016-0.52,0.22c-0.083,0.205,0.016,0.437,0.22,0.52c0.374,0.151,0.709,0.374,0.997,0.662c1.176,1.176,1.176,3.088,0,4.263l-2.414,2.413c-0.569,0.569-1.326,0.883-2.131,0.883s-1.562-0.313-2.132-0.883c-1.175-1.175-1.175-3.087,0-4.262L6.51,9.227c0.156-0.155,0.156-0.408,0-0.564c-0.156-0.156-0.408-0.156-0.564,0l-2.414,2.414c-1.487,1.485-1.487,3.904,0,5.391c0.72,0.72,1.678,1.116,2.696,1.116s1.976-0.396,2.696-1.116l2.414-2.413c1.487-1.486,1.487-3.905,0-5.392C10.974,8.298,10.55,8.017,10.076,7.825"></path>
                </svg>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="modal-reservation">
                <div class="modal-dialog modal modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $templateShare->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body overflow-x-hidden overflow-y-scroll" style="max-height: 500px">
                            <div class="basic-form">
                                <form action="#">
                                    <p>{!! $templateShare->content !!}</p>
                                    <label class="mt-3">Impuesto</label>
                                    <div class="input-group mb-3  input-info">
                                        <span class="input-group-text">$</span>
                                        <input type="number" min="0" class="form-control" id="tax" value="0">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </form>
                            </div>
                            <div class="profile-uoloaded-post border-bottom-1 relative">
                                <img id="image" src="" alt="preview" class="img-fluid w-100 rounded">
                                <button type="button" id="btnDownload" class="hidden btn btn-rounded btn-warning absolute top-0 right-0 m-2 flex items-center"><span class="btn-icon-start text-warning"><i class="fa fa-download color-warning"></i>
                                </span>Descargar</button>
                            </div>

                            <button id="shareLink" class="cursor-pointer text-sm text-center text-yellow-500 focus:outline-none min-w-0"></button>

                            <div class="block-copy__container mt-5 modal-socials-container hidden">
                                <div class="block-copy__body text-center">
                                    <div id="social-links">
                                        <ul>
                                            <li><a target="_blank" href="#" class="social-button modal-share-fb" id="" title="" rel=""><span class="fab fa-facebook-square"></span></a></li>
                                            <li><a target="_blank" href="#" class="social-button modal-share-tw" id="" title="" rel=""><span class="fab fa-twitter"></span></a></li>
                                            <li><a target="_blank" href="#" class="social-button modal-share-tel" id="" title="" rel=""><span class="fab fa-telegram"></span></a></li>
                                            <li><a target="_blank" href="#" class="social-button modal-share-lk" id="" title="" rel=""><span class="fab fa-linkedin"></span></a></li>
                                            <li><a target="_blank" href="#" class="social-button modal-share-wa" id="" title="" rel=""><span class="fab fa-whatsapp"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnShare" class="btn btn-dark">Generar</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endhasrole
    </div>
</div>
@endsection
