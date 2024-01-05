@extends('layouts.frontend.global')

@php
    if ($entity->showcase && $entity->showcase->enabled) $logo = "logo-white.png"; else $logo = "logo-black.png";
@endphp

@prepend('styles')
@if (!$entity->showcase || !$entity->showcase->enabled) <link rel="stylesheet" href="{{ asset('front-template/css/custom.css') }}"> @endif
<link rel="stylesheet" href="{{ asset('front-template/third-party/horizontal-tabbed-navigation-javascript/dist/style.css') }}">

<link href="{{ asset('front-template/css/socials.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('admin-template/icons/fontawesome-free-6.0.0-beta2-web/css/all.min.css') }}"/>
<link href="{{ asset('admin-template/vendor/select2/css/select2.min.css') }}" rel="stylesheet">

<meta property="og:type" content="website"/>
<meta property="og:url" content="{{ route('front.entity', ['friendly' => $entity->friendly]) }}"/>
<meta property="og:title" content="{{ $entity->title }}">
@if ($entity->image) <meta property="og:image" content="{{ asset('storage/' . $entity->image->url) }}"> @endif
<meta property="og:description" content="{!! $entity->summary !!}">

<style>
    .sticky-cta__container-text .blockOverlay {
        display: none !important;
    }
    .js-sticky-cta .highlighted-example-trip__price-value {
        color: #000;
        text-align: left
    }
    .block-copy__body .highlighted-example-trip__price-value.pricing {
        color: white !important;
    }
    .fancy-text {
        border: 1px solid #c8c8c8;
        border-radius: 1em;
        padding: .3rem;
    }

</style>
@endprepend

@prepend('scripts')
    <script src="{{ asset('front-template/js/block-lodge-intro.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/block-lodge-activity-overview.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/block-copy.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/vendors~mapbox.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/mapbox.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/custom.js') }}"></script>

    <script src="{{ asset('admin-template/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin-template/js/plugins-init/select2-init.js') }}"></script>

    <script src="{{ asset('admin-template/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('front-template/js/html2canvas.min.js') }}"></script>

    <script>
        function beneficiarySelect() {
            document.getElementById('btnBeneficiary').dataset.beneficiary = document.getElementById('selectBeneficiary').value
        }

        $(document).ready(function () {
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
                    priceable_type: 'Entity',
                    priceable_id: {{ $entity->id }},
                    check_for_listing: false,
                    referral: '{{ $referral }}'
                }
            })
            .then(function (response) {
                if(response.status == 200) {
                    $('.sticky-price').append(response.data.html);
                    //$('.description-price').append(response.data.html);
                    $('#btn-book, #btn-mobile-book, #btn-desktop-share, #btn-mobile-share').removeClass('hidden');
                }
                $('.js-sticky-cta').unblock();
            })
            .catch(function (error) {
                console.log(error);
                $('.js-sticky-cta').unblock();
            });

            $( ".block-lodge-intro__list-highlights.list-highlights li" ).each(function( index ) {
                $(this).addClass('flex items-center justify-left my-2');
                $(this).prepend('<svg class="list-highlights__list-style" width="4" height="14" viewBox="0 0 4 14" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 0v2h1V0h-1zm1 12v2h-1v-2h1zM2 5a2 2 0 110 4 2 2 0 010-4z" fill="#FC6220" fill-rule="nonzero"></path></svg>');
            });
            $(".characteristics p").each(function( index ) {
                $(this).addClass('flex items-center justify-left my-2');
                $(this).prepend('<svg class="list-highlights__list-style" width="4" height="14" viewBox="0 0 4 14" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 0v2h1V0h-1zm1 12v2h-1v-2h1zM2 5a2 2 0 110 4 2 2 0 010-4z" fill="#FC6220" fill-rule="nonzero"></path></svg>');
            });

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
                        useCORS: true}).then(function(canvas) {
                    var data = canvas.toDataURL('image/jpeg', 0.9);
                    var src = encodeURI(data);
                    document.getElementById('image').src = src;

                    $('.pricing__price').html(old);

                    axios.post("{{ url('/') }}/share", {}, {
                            params: {
                                shareable_type: 'Entity',
                                shareable_id: {{ $entity->id }},
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
                }); }, 1000);
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
                a.download = "{{ $entity->friendly }}.jpeg";
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            });
        })

    </script>
@endprepend

@section('content')
<main id="content" class="content js-main" data-track-id="page">
    <article class="@if ($entity->showcase && $entity->showcase->enabled) page-lodge @else page-generic @endif" data-view="pages/lodge" style="@if ($entity->showcase && $entity->showcase->enabled) background: transparent @endif">
        {{-- Section Showcase --}}
        @if ($entity->showcase && $entity->showcase->enabled)
            @include('front.includes.showcase', ['entity' => $entity])
        {{-- @else
            <header class="block-hero" data-component="block-hero">
                <h2 class="block-hero__subheading js-subheading">
                    {{ $entity->category->title }}
                </h2>
                <h1 class="block-hero__heading js-heading">
                    {{ $entity->title }}
                </h1>
            </header> --}}
        @endif

        {{-- Section Description --}}
        <section class="block-lodge-intro" id="block-description" data-component="block-lodge-intro">
            <div class="block-lodge-intro__container-content">
                <h2 class="block-lodge-intro__subheading js-subheading text-white">
                    @if ($category)
                        <a href="{{ route('front.category', ['friendly' => $category->friendly]) }}">{!! $category->title !!}</a>
                    @elseif ($package)
                        <a href="{{ route('front.package', ['friendly' => $package->friendly]) }}">{!! $package->title !!}</a>
                    @endif
                </h2>

                <h1 class="block-lodge-intro__heading js-heading text-white">
                    {!! $entity->title !!}
                </h1>

                <div class="block-lodge-intro__container-body-map js-container-map">
                    <div class="block-lodge-intro__container-body" @if (!$entity->latitude || !$entity->longitude) style="width:100%" @endif>
                        {!! $entity->content !!}

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

                    @if ($entity->latitude && $entity->longitude)
                        <div class="block-lodge-intro__container-map">
                            <div class="block-lodge-intro__map mapbox" data-component="mapbox" style="width: 100%; height: 100%;"
                                data-geojson='{"type":"FeatureCollection","features":[{"type":"Feature","geometry":{"type":"Point","coordinates":[{{ $entity->longitude }},{{  $entity->latitude  }}]},"properties":{"title":"{{ $entity->title }}","days":""}}]}'>
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

                    @if ($entity->characteristics)
                        <section class="block-lodge-intro__list-highlights list-highlights">
                            <h3 class="list-highlights__subheading text-white">
                                {{ __('Highlights') }}
                            </h3>
                            <h2 class="list-highlights__heading text-white">
                                <em>{{ __('Characteristics') }}</em>
                            </h2>

                            <div class="characteristics mt-3">
                                {!! $entity->characteristics !!}
                            </div>

                        </section>
                    @endif

                    @if ($entity->image)
                        <div class="block-lodge-intro__image-wide">
                            <div class="responsive-image responsive-image--parallax">
                                <picture class="responsive-image__picture " data-component="parallax" data-parallax-offset="200" data-parallax-direction="-1" data-parallax-start="-100">
                                    <img class="responsive-image__img lazyload" quickbeam="image"
                                        data-src="{{ asset('storage/' . $entity->image->url) }}" alt="{{ $entity->title }}"
                                        style="background-image: url({{ asset('storage/' . $entity->image->url) }})">
                                </picture>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

          {{-- Section Experiences --}}
        @if (count($entity->experiences) > 0)
            <section class="block-lodge-activity-overview mb-32" data-component="block-lodge-activity-overview">
                <h2 class="block-lodge-activity-overview__heading">
                    <em>{{ __('Experiences') }}</em>
                </h2>

                <ul class="block-lodge-activity-overview__list">
                    @foreach ($entity->experiences as $experience)
                        @if ($experience->enabled)
                            <li class="block-lodge-activity-overview__list-item">
                                <section class="activity-lodge">
                                    <div class="responsive-image responsive-image--object-fit activity-lodge__image">
                                        <picture class="responsive-image__picture ">
                                            <source media="(max-width: 768px)"
                                                    data-srcset="{{ asset('storage/' . $experience->image->url) }}"
                                                    type="image/jpg">
                                            <img class="responsive-image__img lazyload"
                                                data-src="{{ asset('storage/' . $experience->image->url) }}"
                                                alt="{{ $experience->title }}">
                                        </picture>
                                    </div>

                                    <h3 class="activity-lodge__heading mt-2">
                                        {{ $experience->title }}
                                    </h3>

                                    <div class="activity-lodge__description">
                                        {!! Str::limit($experience->content, 180, '...')  !!}
                                    </div>
                                </section>
                            </li>
                        @endif
                    @endforeach
                </ul>

                {{-- <button class="button-outline button-outline--inverted block-lodge-activity-overview__button-show js-button-show">
                    <span class="button-outline__label js-label">
                        + Más actividades
                    </span>
                </button> --}}
            </section>
        @endif

        @include('front.includes.texts', ['texts' => $entity->texts])

    </article>
</main>
@endsection

@section('sticky-reservation')
    <div class="js-sticky-cta sticky-cta">
        <div class="sticky-cta__container-grid items-center">

            <div class="sticky-cta__container-text sticky-price">
                <div class="sticky-cta__text">
                    <p>{!! isset($paramTitle) ? $paramTitle : $entity->title !!}</p>
                </div>
            </div>

            {{-- <div class="sticky-cta__container-text">
                <div class="sticky-cta__text">
                    <p>Disponibilidad</p>
                    <span class="highlighted-example-trip__price-value pricing" data-component="pricing" data-type="static">
                        @foreach ($globalBalance as $balance)
                        <span class="pricing__symbol js-symbol sticky-cta__text-upper">
                            {{ $balance['key'] }}
                        </span>
                        <span class="pricing__price js-price sticky-cta__text-upper" data-default="1300">
                            {{ $balance['value'] }}
                        </span> <br>
                        @endforeach
                    </span>
                </div>
            </div> --}}

            @if ($data && $data->hame_phone)
                <div class="sticky-cta__cta-phone mr-3">
                    <span>Teléfonos</span><br>
                    <a class="sticky-cta__text-numbers" href="tel:{{ $data->hame_phone }}" rel="noopener noreferrer"
                       aria-label="Call Us">
                        {{ $data->hame_phone }}
                    </a><br>
                </div>
            @endif
            @if ($data && $data->hame_email)
                <div class="sticky-cta__cta-phone mr-3">
                    <span>Correos</span><br>
                    <a class="sticky-cta__text-numbers" href="mailto:{{ $data->hame_email }}" rel="noopener noreferrer"
                       aria-label="Call Us">
                        {{ $data->hame_email }}
                    </a><br>
                </div>
            @endif

            @if ($data && $data->hame_phone)
                <a href="tel:{{ $data->hame_phone }}" class="button-outline mr-1">
                    <span class="button-outline__label js-label sticky-cta__button-desktop">{{ __('Contact') }}</span>
                    <svg class="svg-icon sticky-cta__button-mobile border-none ml-0" viewBox="-5 -9 30 30">
                        <path fill="currentColor"
                              d="M13.372,1.781H6.628c-0.696,0-1.265,0.569-1.265,1.265v13.91c0,0.695,0.569,1.265,1.265,1.265h6.744c0.695,0,1.265-0.569,1.265-1.265V3.045C14.637,2.35,14.067,1.781,13.372,1.781 M13.794,16.955c0,0.228-0.194,0.421-0.422,0.421H6.628c-0.228,0-0.421-0.193-0.421-0.421v-0.843h7.587V16.955z M13.794,15.269H6.207V4.731h7.587V15.269z M13.794,3.888H6.207V3.045c0-0.228,0.194-0.421,0.421-0.421h6.744c0.228,0,0.422,0.194,0.422,0.421V3.888z">
                        </path>
                    </svg>
                </a>
            @endif
            {{-- @foreach ($data as $phone)
            <a href="tel:{{ $phone->value }}" class="button-outline mr-1">
                <span class="button-outline__label js-label sticky-cta__button-desktop">{{ __('Contact') }}</span>
                <svg class="svg-icon sticky-cta__button-mobile border-none ml-0" viewBox="-5 -9 30 30">
                    <path fill="currentColor"
                        d="M13.372,1.781H6.628c-0.696,0-1.265,0.569-1.265,1.265v13.91c0,0.695,0.569,1.265,1.265,1.265h6.744c0.695,0,1.265-0.569,1.265-1.265V3.045C14.637,2.35,14.067,1.781,13.372,1.781 M13.794,16.955c0,0.228-0.194,0.421-0.422,0.421H6.628c-0.228,0-0.421-0.193-0.421-0.421v-0.843h7.587V16.955z M13.794,15.269H6.207V4.731h7.587V15.269z M13.794,3.888H6.207V3.045c0-0.228,0.194-0.421,0.421-0.421h6.744c0.228,0,0.422,0.194,0.422,0.421V3.888z">
                    </path>
                </svg>
            </a>
            @endforeach --}}

            {{-- @auth --}}
            <button id="btn-book" data-title="{!! $entity->title !!}" data-type="entity" data-id="{{ $entity->id }}"
                    data-parent-id="@if ($category) {{ $category->id }} @elseif ($package) {{ $package->id }} @endif"
                    data-parent-type="@if ($category) Category @elseif ($package) Package @endif"
                    @auth
                        @if ($entity->bank_interaction)
                        data-beneficiary="@if (count(auth()->user()->beneficiaries) > 0) {{ auth()->user()->beneficiaries->first()->id }} @endif" @endif
                    @endauth
                    class="@if (!$entity->bank_interaction || ($entity->bank_interaction && auth()->user() == null) ||
            (auth()->user() && count(auth()->user()->beneficiaries) == 0)) btn-add-to-cart @endif button-outline"
                    @auth
                    @if ($entity->bank_interaction && count(auth()->user()->beneficiaries) > 0)
                    data-bs-toggle="modal" data-bs-target="#modal-beneficiary"
                @endif
                @endauth
            >
                <img class="hidden"
                     src="@if ($entity->image) {{ asset('storage/' . $entity->image->url) }} @else https://ui-avatars.com/api/?name={{ $entity->title }}&color=CCCCCC&background=000000 @endif">
                <span class="button-outline__label js-label sticky-cta__button-desktop" id="AddToCartText">{{ __('Booking')
                }}</span>
                <svg class="svg-icon sticky-cta__button-mobile border-none ml-0" viewBox="-5 -5 30 30">
                    <path fill="currentColor"
                          d="M14.467,1.771H5.533c-0.258,0-0.47,0.211-0.47,0.47v15.516c0,0.414,0.504,0.634,0.802,0.331L10,13.955l4.136,4.133c0.241,0.241,0.802,0.169,0.802-0.331V2.241C14.938,1.982,14.726,1.771,14.467,1.771 M13.997,16.621l-3.665-3.662c-0.186-0.186-0.479-0.186-0.664,0l-3.666,3.662V2.711h7.994V16.621z">
                    </path>
                </svg>

            </button>

            @auth
                @if ($entity->bank_interaction && count(auth()->user()->beneficiaries) > 0)
                    <div class="modal fade" id="modal-beneficiary">
                        <div class="modal-dialog modal modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Beneficiario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body overflow-x-hidden overflow-y-scroll" style="max-height: 500px">
                                    <div class="basic-form">
                                        <form action="#">
                                            <p>Seleccione un beneficiario</p>
                                            <div class="w-full my-1">
                                                <select name="selectBeneficiary" class="single-select form-control wide"
                                                        id="selectBeneficiary" onchange="beneficiarySelect()">
                                                    @foreach (auth()->user()->beneficiaries as $beneficiary)
                                                        <option
                                                            value="{{ $beneficiary->id }}">{{ $beneficiary->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btnBeneficiary" class="btn btn-dark btn-add-to-cart"
                                            data-title="{!! $entity->title !!}" data-type="entity"
                                            data-id="{{ $entity->id }}"
                                            data-parent-id="@if ($category) {{ $category->id }} @elseif ($package) {{ $package->id }} @endif"
                                            data-parent-type="@if ($category) Category @elseif ($package) Package @endif"
                                            data-bs-dismiss="modal"
                                            data-beneficiary="@if (count(auth()->user()->beneficiaries) > 0) {{ auth()->user()->beneficiaries->first()->id }} @endif">
                                        <img class="hidden"
                                             src="@if ($entity->image) {{ asset('storage/' . $entity->image->url) }} @else https://ui-avatars.com/api/?name={{ $entity->title }}&color=CCCCCC&background=000000 @endif">
                                        Adicionar
                                    </button>
                                    <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="modal fade" id="modal-add-beneficiary">
                        <div class="modal-dialog modal modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Crear nuevo beneficiario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body overflow-x-hidden overflow-y-scroll">
                                    <div class="basic-form">
                                        <form action="{{ route('front.beneficiary.add') }}" method="POST"
                                              id="form-add-beneficiary">
                                            <div class="w-full my-1">
                                                <!-- Nombre -->
                                                <div class="col-span-6 sm:col-span-6">
                                                    <label
                                                        class="capitalize block font-medium text-sm text-gray-700 mt-3"
                                                        for="name">Nombre Completo <span class="text-red-500">*</span>
                                                    </label>
                                                    <input type="text" id="name" data-comp="Nombre"
                                                           class="mt-1 block w-full fancy-text" required/>
                                                </div>
                                            </div>
                                            <div class="w-full my-1">
                                                <!-- Identity Number -->
                                                <div class="col-span-6 sm:col-span-6">
                                                    <label
                                                        class="capitalize block font-medium text-sm text-gray-700 mt-3"
                                                        for="identification">No. Identidad <span
                                                            class="text-red-500">*</span>
                                                    </label>
                                                    <input type="text" id="identification" data-comp="Identidad"
                                                           class="mt-1 block w-full fancy-text" required/>
                                                </div>
                                            </div>
                                            <div class="w-full my-1">
                                                <!-- Phone -->
                                                <div class="col-span-6 sm:col-span-6">
                                                    <label
                                                        class="capitalize block font-medium text-sm text-gray-700 mt-3"
                                                        for="phone">Teléfonos <span class="text-red-500">*</span>
                                                    </label>
                                                    <input type="text" id="phone" data-comp="Teléfono"
                                                           class="mt-1 block w-full fancy-text" required/>
                                                </div>
                                            </div>
                                            <div class="w-full my-1">
                                                <!-- Email -->
                                                <div class="col-span-6 sm:col-span-6">
                                                    <label
                                                        class="capitalize block font-medium text-sm text-gray-700 mt-3"
                                                        for="email">Correo electrónico <span
                                                            class="text-red-500">*</span> </label>
                                                    <input type="email" id="email" data-comp="Correo electrónico"
                                                           class="mt-1 block w-full fancy-text" required/>
                                                </div>
                                            </div>
                                            <div class="w-full my-1">
                                                <!-- Address -->
                                                <div class="col-span-6 sm:col-span-6">
                                                    <label
                                                        class="capitalize block font-medium text-sm text-gray-700 mt-3"
                                                        for="email">Dirección <span class="text-red-500">*</span>
                                                    </label>
                                                    <input type="text" id="address" data-comp="Dirección"
                                                           class="mt-1 block w-full fancy-text" required/>
                                                </div>
                                            </div>
                                            <div class="w-full my-1">
                                                <!-- Location -->
                                                <div class="col-span-6 sm:col-span-6">
                                                    <label
                                                        class="capitalize block font-medium text-sm text-gray-700 mt-3"
                                                        for="location">Localización <span class="text-red-500">*</span>
                                                    </label>
                                                    <div class="row align-items-center">
                                                        <div class="w-full my-1">
                                                            @isset ($locations)
                                                                <select name="location" data-comp="Localización"
                                                                        class="form-control wide single-select "
                                                                        id="beneficiaries-location-dropdown" required>
                                                                    @php
                                                                        $first_group = ($locations && count($locations)) > 0 ? $locations[0]->provincia : null;
                                                                    @endphp
                                                                    @foreach ($locations as $location)
                                                                    @if ($location->provincia != $first_group || $loop->index == 0)
                                                                    @if ($loop->index > 0)
                                                                    </optgroup>
                                                                    @endif

                                                                    <optgroup label="{{ $location->provincia }}">
                                                                        <option
                                                                            value="{{ $location->id }}">{{ $location->municipio }}
                                                                        </option>
                                                                        @else
                                                                            <option
                                                                                value="{{ $location->id }}">{{ $location->municipio }}
                                                                            </option>
                                                                        @endif

                                                                        @php
                                                                            $first_group = $location->provincia;
                                                                        @endphp
                                                                        @endforeach

                                                                    </optgroup>
                                                                </select>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Crear</button>
                                    <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endauth

            {{-- @endauth --}}

            @isset($referral)
                <input type="hidden" id="referral" value="{{ $referral }}">
            @endisset

            @hasrole('comercial')
            <button data-bs-toggle="modal" data-bs-target="#modal-reservation" id="btn-desktop-share"
                    class="hidden button-outline ml-1">
                <span class="button-outline__label js-label sticky-cta__button-desktop">{{ __('Trade') }}</span>
                <svg class="svg-icon sticky-cta__button-mobile border-none ml-0" viewBox="-5 -5 30 30">
                    <path fill="currentColor"
                          d="M16.469,8.924l-2.414,2.413c-0.156,0.156-0.408,0.156-0.564,0c-0.156-0.155-0.156-0.408,0-0.563l2.414-2.414c1.175-1.175,1.175-3.087,0-4.262c-0.57-0.569-1.326-0.883-2.132-0.883s-1.562,0.313-2.132,0.883L9.227,6.511c-1.175,1.175-1.175,3.087,0,4.263c0.288,0.288,0.624,0.511,0.997,0.662c0.204,0.083,0.303,0.315,0.22,0.52c-0.171,0.422-0.643,0.17-0.52,0.22c-0.473-0.191-0.898-0.474-1.262-0.838c-1.487-1.485-1.487-3.904,0-5.391l2.414-2.413c0.72-0.72,1.678-1.117,2.696-1.117s1.976,0.396,2.696,1.117C17.955,5.02,17.955,7.438,16.469,8.924 M10.076,7.825c-0.205-0.083-0.437,0.016-0.52,0.22c-0.083,0.205,0.016,0.437,0.22,0.52c0.374,0.151,0.709,0.374,0.997,0.662c1.176,1.176,1.176,3.088,0,4.263l-2.414,2.413c-0.569,0.569-1.326,0.883-2.131,0.883s-1.562-0.313-2.132-0.883c-1.175-1.175-1.175-3.087,0-4.262L6.51,9.227c0.156-0.155,0.156-0.408,0-0.564c-0.156-0.156-0.408-0.156-0.564,0l-2.414,2.414c-1.487,1.485-1.487,3.904,0,5.391c0.72,0.72,1.678,1.116,2.696,1.116s1.976-0.396,2.696-1.116l2.414-2.413c1.487-1.486,1.487-3.905,0-5.392C10.974,8.298,10.55,8.017,10.076,7.825">
                    </path>
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
                                <button type="button" id="btnDownload"
                                        class="hidden btn btn-rounded btn-warning absolute top-0 right-0 m-2 flex items-center"><span
                                        class="btn-icon-start text-warning"><i class="fa fa-download color-warning"></i>
                                </span>Descargar
                                </button>
                            </div>

                            <button id="shareLink"
                                    class="cursor-pointer text-sm text-center text-yellow-500 focus:outline-none min-w-0"></button>

                            <div class="block-copy__container mt-5 modal-socials-container hidden">
                                <div class="block-copy__body text-center">
                                    <div id="social-links">
                                        <ul>
                                            <li><a target="_blank" href="#" class="social-button modal-share-fb" id=""
                                                   title="" rel=""><span class="fab fa-facebook-square"></span></a></li>
                                            <li><a target="_blank" href="#" class="social-button modal-share-tw" id=""
                                                   title="" rel=""><span class="fab fa-twitter"></span></a></li>
                                            <li><a target="_blank" href="#" class="social-button modal-share-tel" id=""
                                                   title="" rel=""><span class="fab fa-telegram"></span></a></li>
                                            <li><a target="_blank" href="#" class="social-button modal-share-lk" id=""
                                                   title="" rel=""><span class="fab fa-linkedin"></span></a></li>
                                            <li><a target="_blank" href="#" class="social-button modal-share-wa" id=""
                                                   title="" rel=""><span class="fab fa-whatsapp"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnShare" class="btn btn-dark">Generar</button>
                            <button type="button" class="btn btn-light"
                                    data-bs-dismiss="modal">{{ __('Close') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            @endhasrole

        </div>
    </div>
@endsection
