@extends('layouts.frontend.global')

@php
if ($category->showcase && $category->showcase->enabled) $logo = "logo-white.png"; else $logo = "logo-black.png";
@endphp

@prepend('styles')
@if (!$category->showcase || !$category->showcase->enabled)
    <link rel="stylesheet" href="{{ asset('front-template/css/custom.css') }}">
@endif

<link rel="stylesheet" href="{{ asset('front-template/third-party/horizontal-tabbed-navigation/dist/style.css') }}">

<style>
    body {
        background-color: #1e2023 !important;
    }
    .highlighted-example-trip__price .blockOverlay {
        display: none !important;
    }
    .highlighted-example-trip__price .blockUI.blockMsg {
        position: relative !important;
    }
    .highlighted-example-trip .highlighted-example-trip__price-value.pricing {
        color: #fff !important;
    }
</style>
@endprepend

@prepend('scripts')
    <script src="{{ asset('front-template/js/block-category-intro.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/block-package-slider.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/block-lodge-activity-overview.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/block-copy.bundle.js') }}"></script>

    <script src="{{ asset('front-template/js/custom.js') }}"></script>
    <script src="{{ asset('front-template/third-party/horizontal-tabbed-navigation/dist/script.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.highlighted-example-trip__price').block({
                message: '<div class="lds-circle"><div></div></div>',
                css: {
                    backgroundColor: 'transparent',
                    color: 'white',
                    cursor: 'wait',
                    border: 'none'
                }
            });

            @foreach ($category->packages as $package)
                ajaxPrice('Package', {{ $package->id }});
            @endforeach

            @foreach ($category->enabledEntityCategories as $ecat)
                @foreach ($ecat->enabledEntities($category) as $entity)
                    ajaxPrice('Entity', {{ $entity->id }});
                @endforeach
            @endforeach
        })

        function ajaxPrice(type, id) {
            axios.post("{{ url('/') }}/price", {},
                {
                    params: {
                        priceable_type: type,
                        priceable_id: id,
                        check_for_listing: true
                    }
                }
            )
            .then(function (response) {
                if(response.status == 200) {
                    if (response.data.html != "") {
                        if (type == 'Entity') {
                            $('#price-component-' + id).append(response.data.html);
                            // $('#btn-add-to-cart-' + id).removeClass('hidden');
                        }
                        else {
                            $('#price-package-component-' + id).append(response.data.html);
                        }
                    }

                    $('#btn-add-to-cart-' + id).removeClass('hidden');

                    $('#price-component-' + id).unblock();
                    $('#price-package-component-' + id).unblock();
                }
            })
            .catch(function (error) {
                console.log(error);
                if (type == 'Entity')
                    $('#price-component-' + id).unblock();
                else
                    $('#price-package-component-' + id).unblock();
            })
        }

    </script>
@endprepend

@section('content')
<main id="content" class="content js-main" data-track-id="page">
    <article class="@if ($category->showcase && $category->showcase->enabled) page-lodge @else page-generic @endif" data-view="pages/lodge" style="@if ($category->showcase && $category->showcase->enabled) background: transparent @endif">
        {{-- Section Showcase --}}
        @if ($category->showcase && $category->showcase->enabled)
            @include('front.includes.showcase', ['entity' => $category])
        {{-- @else
            <header class="block-hero" data-component="block-hero">
                <h2 class="block-hero__subheading js-subheading">
                    {{ $category->subtitle }}
                </h2>
                <h1 class="block-hero__heading js-heading">
                    {{ $category->title }}
                </h1>
            </header> --}}
        @endif

        {{-- Section Intro --}}
        @include('front.includes.intro', ['intro' => $category->intro])

        {{-- Section Promo Tours --}}
        @livewire('package-list', ['packages' => $category->packages])

        {{-- Section Subcategories --}}
        @if (count($category->enabledSubcategories()) > 0)
            <section class="block-continent-country-list">
                <div class="block-continent-country-list__container">
                    <div class="block-continent-country-list__container-copy">
                        <h3 class="block-continent-country-list__subheading">
                            {{ $category->title }}
                        </h3>
                        <h2 class="block-continent-country-list__heading ">
                            {{-- ¿Qué lugares te gustaría <em>explorar</em>? --}}
                            {!! $category->subtitle !!}
                        </h2>
                        <div class="block-continent-country-list__body">
                            {!! $category->content !!}
                        </div>
                    </div>
                </div>

                <ul class="block-continent-country-list__list">
                    @foreach ($category->enabledSubcategories() as $subcategory)
                        @if ($subcategory->enabled && $subcategory->image)
                            <li class="block-continent-country-list__list-item">
                                <a class="block-continent-country-list__link" href="{{ route('front.category', ['friendly' => $subcategory->friendly]) }}">
                                    <span class="block-continent-country-list__label-country">
                                        {{ $subcategory->title }}
                                    </span>

                                    <div class="responsive-image responsive-image--parallax block-continent-country-list__image">
                                        <picture class="responsive-image__picture "  data-component="parallax" data-parallax-offset="100" data-parallax-direction="-1" data-parallax-start="-50" >
                                            <source media="(max-width: 768px)" data-srcset="{{ asset('storage/' . $subcategory->image->url) }}" type="image/jpg">
                                            <img class="responsive-image__img lazyload"  data-src="{{ asset('storage/' . $subcategory->image->url) }}" alt="{{ $subcategory->title }}">
                                        </picture>
                                    </div>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </section>
        @endif

        <div class="block-featured-activities">

            @include('front.includes.texts', ['texts' => $category->texts])

            {{-- Section Entities y EntityCategories --}}
            @if (count($category->enabledEntityCategories) > 0)
                <div class="block-lodge-activity-overview" data-component="block-lodge-activity-overview" style="padding: 0">
                    <h2 class="block-newsletter__heading js-heading">{!! $category->entities_intro !!}</h2>

                    @if (count($category->enabledEntityCategories) > 1)
                        <nav class="nav-tab w-full mt-20">
                            <ul>
                                @foreach ($category->enabledEntityCategories as $ecat)
                                    <li>
                                        <button class="text-3xl flex justify-center flex-col" data-tab="tab-{{ $ecat->id }}">
                                            @if ($ecat->svg)
                                                <object class="outline-svg h-16" data="{{ asset('storage/' . $ecat->svg) }}" type="image/svg+xml">
                                                    <img class="h-16" src="{{ asset('storage/' . $ecat->svg) }}">
                                                </object>
                                                {{-- <br> --}}
                                            @endif
                                            {{ $ecat->title }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>

                        @foreach ($category->enabledEntityCategories as $ecat)
                            <section class="content-tab w-full" id="tab-{{ $ecat->id }}">

                                <div class="highlighted-example-trips-summary w-full">
                                    <h3 class="highlighted-example-trips-summary__headline">{!! $ecat->subtitle !!}</h3>
                                    <p class="highlighted-example-trips-summary__description">{!! $ecat->content !!}</p>
                                </div>

                                @include('front.includes.entities', ['ecat' => $ecat])

                            </section>
                        @endforeach

                    @else
                        @include('front.includes.entities', ['ecat' => $category->enabledEntityCategories[0]])
                    @endif


                    {{-- <button class="button-outline button-outline--inverted block-lodge-activity-overview__button-show js-button-show">
                        <span class="button-outline__label js-label">
                            + Más actividades
                        </span>
                    </button> --}}

                </div>
            @endif
        </div>

    </article>
</main>
@endsection

@section('sticky-reservation')
    <div class="js-sticky-cta sticky-cta">
        <div class="sticky-cta__container-grid items-center">

            <div class="sticky-cta__container-text sticky-price">
                <div class="sticky-cta__text">
                    <p>Planificar {!! $category->title !!}</p>
                </div>
            </div>

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

            {{-- @auth --}}
            <button id="btn-book"
                    data-title="{!! $category->title !!}"
                    data-type="category" data-id="{{ $category->id }}"
                    data-parent-id="@if ($category->parent) {{ $category->parent->id }} @endif"
                    data-parent-type="@if ($category->parent) Category @endif"
                    class="btn-add-to-cart button-outline"
            >
                <img alt="img" class="hidden" src="@if ($category->image) {{ asset('storage/' . $category->image->url) }} @else https://ui-avatars.com/api/?name={{ $category->title }}&color=CCCCCC&background=000000 @endif">
                <span class="button-outline__label js-label sticky-cta__button-desktop" id="AddToCartText">{{ __('Booking') }}</span>
                <svg class="svg-icon sticky-cta__button-mobile border-none ml-0" viewBox="-5 -5 30 30">
                    <path fill="currentColor"
                          d="M14.467,1.771H5.533c-0.258,0-0.47,0.211-0.47,0.47v15.516c0,0.414,0.504,0.634,0.802,0.331L10,13.955l4.136,4.133c0.241,0.241,0.802,0.169,0.802-0.331V2.241C14.938,1.982,14.726,1.771,14.467,1.771 M13.997,16.621l-3.665-3.662c-0.186-0.186-0.479-0.186-0.664,0l-3.666,3.662V2.711h7.994V16.621z">
                    </path>
                </svg>

            </button>
            {{-- @endauth --}}

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
