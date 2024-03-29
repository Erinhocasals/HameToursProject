@extends('layouts.frontend.global')

@php
$logo = "logo-white.png"
@endphp

@push('styles')
@endpush

@prepend('scripts')
    <script src="{{ asset('front-template/js/block-featured-story.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/block-about.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/block-region-slider.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/block-package-slider.bundle.js') }}"></script>

    {{-- @if ($message = Session::get('success'))
        <script>toastr.info('{{ $message }}');</script>
    @elseif ($message = Session::get('error'))
        <script>toastr.error('{{ $message }}');</script>
    @endif --}}

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

            @foreach ($packages as $package)
                ajaxPrice('Package', {{ $package->id }});
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
                    if (type == 'Entity') {
                        $('#price-component-' + id).append(response.data.html);
                        $('#price-component-' + id).unblock();
                        $('#btn-add-to-cart-' + id).removeClass('hidden');
                    }
                    else {
                        $('#price-package-component-' + id).append(response.data.html);
                        $('#price-package-component-' + id).unblock();
                    }

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
    <article class="page-home">
        {{-- Section Intro --}}
        @if (count($slideshows))
            <section class="block block-homepage-hero" data-block-type="homepage-hero" data-component="block-homepage-hero">
                <div class="block-homepage-hero__background js-background">
                    <canvas data-intensity="1.0" data-center-x="0.5" , data-center-y="0.5"
                        data-diffuse-texture="@if ($slideshows[0]->slideable) {{ asset('storage/' . $slideshows[0]->slideable->image->url ) }} @else {{ asset('storage/' . $slideshows[0]->image->url ) }} @endif"
                        data-depth-texture="{{ asset('front-template/assets/img/dummy/webgl/depth-map.jpg') }}"
                        class="block-homepage-hero__background-canvas js-backgound-canvas"></canvas>
                    <span class="block-homepage-hero__background-overlay js-background-overlay"></span>
                </div>

                <div class="block-homepage-hero__content js-content">
                    <h3 class="block-homepage-hero__subheading js-subheading">{{ $slideshows[0]->subtitle }} </h3>
                    <h2 class="block-homepage-hero__heading js-heading">
                        {!! $slideshows[0]->slideable ? $slideshows[0]->slideable->title : $slideshows[0]->title !!}
                    </h2>
                </div>

                <div class="block-homepage-hero__footer">
                    {{-- <button data-component="button-video" id="button-video"
                        class="button-video block-homepage-hero__button js-button-video" aria-label="Open video"
                        data-image="{{ asset('dummy/havana-8.jpg') }}" data-overlay='
                    {
                        "type": "video",
                        "url": "https://vimeo.com/43505088",
                        "label": "Play",
                        "description": "",
                        "poster": "{{ asset('dummy/havana-8.jpg') }}"
                    }'>
                        <canvas class="button-video__canvas js-canvas"></canvas>
                        <span class="button-video__label js-label">Video Promocional (Contenido Estatico)</span>
                    </button> --}}

                    <div class="scroll-tip block-homepage-hero__scroll-tip js-scroll-tip">
                        <canvas class="scroll-tip__background js-canvas"></canvas>
                        <p class="scroll-tip__label js-label">{{ __('Scroll Down') }}</p>
                    </div>
                </div>
            </section>
        @endif

        {{-- Section Infos --}}
        @foreach ($infos as $info)
            @if ($info->intro)
                <section class="block block-about-us" data-block-type="block-info" data-component="block-about-us">
                    <div data-component="parallax" data-parallax-offset="30" data-parallax-direction="1">
                        <h3 class="block-about-us__subheading js-subheading text-white">{!! $info->intro->subtitle !!}</h3>
                        <h2 class="block-about-us__heading js-heading text-white">
                            <p>{!! $info->intro->title !!}</p>
                        </h2>
                    </div>
                    <div class="block-about-us__content mt-5">
                        <div class="block-about-us__gallery mt-20">
                            <div class="block-about-us__gallery-item js-image-container" data-component="parallax" data-parallax-offset="150">
                                <div class="block-about-us__image-wrapper">
                                    <div class="responsive-image responsive-image--parallax block-about-us__image js-image">
                                        <picture class="responsive-image__picture " data-component="parallax"
                                            data-parallax-offset="100" data-parallax-direction="-1" data-parallax-start="-50">
                                            <img class="responsive-image__img lazyload"
                                                data-src="{{ asset('storage/' . $info->intro->big_image) }}" alt="Promo 1">
                                        </picture>
                                    </div>
                                </div>
                            </div>
                            <div class="block-about-us__gallery-item js-image-container" data-component="parallax" data-parallax-offset="225">
                                <div class="block-about-us__image-wrapper">
                                    <div class="responsive-image responsive-image--parallax block-about-us__image js-image">
                                        <picture class="responsive-image__picture " data-component="parallax"
                                            data-parallax-offset="100" data-parallax-direction="-1" data-parallax-start="-50">
                                            <img class="responsive-image__img lazyload"
                                                data-src="{{ asset('storage/' . $info->intro->small_image) }}" alt="Promo 2">
                                        </picture>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="block-about-us__copy">
                            {!! Str::limit($info->intro->content, 400, '...')  !!}
                        </div>

                        <ul class="block-about-us__list js-list">
                            @foreach ($info->texts as $text)
                                <li class="block-about-us__item js-item">
                                    @if ($text->image)
                                        <div class="block-about-us__item-column">
                                            <div alt="39×41" style="width: 44px; height: 44px" class="block-about-us__item-icon">
                                                <img src="{{ asset('storage/' . $text->image->url) }}" alt="{!! $text->title !!}" style="-webkit-filter: invert(100%);filter: invert(100%);">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="block-about-us__item-column">
                                        <h4 class="block-about-us__item-heading text-white">{!! $text->title !!}</h4>
                                        <p class="block-about-us__item-paragraph text-white">{!! $text->content !!}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            @endif
        @endforeach

        @livewire('package-list', ['packages' => $packages])

        {{-- Region Slider --}}
        @if ($categories)
            <section class="block block-continent-slider" data-block-type="continent-slider" data-amount="{{ count($categories) }}" data-component="block-continent-slider" data-custom-cursor="drag">
                <canvas class="block-continent-slider__background js-background" data-component="parallax" data-parallax-offset="40" data-parallax-direction="-1"
                        @foreach ($categories as $category)
                            @if ($category->showcase->images)
                                data-continent-image-{{ $category->friendly }}="{{ asset('storage/' . $category->showcase->images->first()->url) }}"
                            @endif
                        @endforeach
                ></canvas>

                <span class="block-continent-slider__gradient"></span>

                <ul class="block-continent-slider__continents js-continents">
                    @foreach ($categories as $category)
                        <li class="block-continent-slider__continent js-continent js-item" data-continent="{{ $category->friendly }}">
                            <div class="block-continent-slider__outline js-outline">
                                {{-- <svg id="Path" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400"><g><path d="M123.87,49.55c-.54,1.13-1.07,2.28-1.64,3.39-1.68,3.28-2.31,6.88-3.26,10.38a3.75,3.75,0,0,0,.51,3.29,1.22,1.22,0,0,1,.32,1.19,3.67,3.67,0,0,0,.54,3.6c1.2,1.86,1.46,4.06,2.43,6a2,2,0,0,0,1.78,1.36A2.72,2.72,0,0,1,126.93,80c.67,1.27,1.64,1.11,2.57.64a8.94,8.94,0,0,1,3.78-.94,2.25,2.25,0,0,0,1.14-.49,2.32,2.32,0,0,1,1.56-.45c1.2.24,2-.5,3-.88,2-.76,2.44-2.73,3.48-4.18.57-.78.59-2.07.87-3.13a2.42,2.42,0,0,1,2-2c2.68-.4,5.23-1.83,8.07-1.1a3.37,3.37,0,0,0,1.5-.15c1.26-.24,1.95.53,1.67,1.78a4.24,4.24,0,0,1-1.52,2.43,6.33,6.33,0,0,0-2,4.22,16.84,16.84,0,0,1-1.83,4.83c-.09.19-.21.4-.47.3a.7.7,0,0,1-.41-.6,11.12,11.12,0,0,1,0-1.16c-.33.27-.64.67-.47,1,.61,1.11-.06,2.05-.3,3.05a6.55,6.55,0,0,0-.3,1.35c0,2-.57,3.76-2.42,4.87a.61.61,0,0,0-.31.76c.19.38.53.05.8.1a61.71,61.71,0,0,0,6.52.44,1.21,1.21,0,0,0,.63,0c1.59-.91,3.33-.73,5-.64s3.27.15,4.22,1.74c.39.64,1.14.73,1.55,1.27.25.33.76.89.69,1-1,1.32.14,3.13-1.12,4.48s-.63,3-.92,4.52a11.05,11.05,0,0,1-.61,2.14,11.89,11.89,0,0,0-.9,4.19,8,8,0,0,0,1.78,4.25c1,1.43,2.6,2.38,3.18,4.15.13.4.45.91,1,.15.31-.44.72,0,.93.26.87,1.09,1.82.86,2.8.22,1.45-.94,3.28-1.2,4.49-2.57a.7.7,0,0,1,.59-.15c2.15.67,4.69.45,6.09,2.81.65,1.07,2.08,1.45,2.53,3,.6-2.64,2.62-3.68,4.33-5,.29-.22.47-.35.47-.77a6.75,6.75,0,0,1,2.49-5.51c.25-.22.65-.59.83-.51,1.94.78,3.27-1.64,5.2-.95.43.15.86-.26,1.23-.56a10,10,0,0,1,2.27-1.39c.43-.18.88-.38,1-.89.32-1.22,1.41-1.35,2.35-1.58a1.45,1.45,0,0,1,1.55.88c.32.61,0,1-.43,1.45a4.18,4.18,0,0,1-1.46,1c-.94.33-1.07,1-.62,1.81.11.22.31.46.3.68,0,1,.35.81.85.34a6.2,6.2,0,0,1,2.92-1.45c1-.23,1.79-.61,1.42-1.88a2.42,2.42,0,0,1,0-.76c0-.53.11-1.07.78-1.12a1,1,0,0,1,1.05,1c0,1.38.55,1.75,1.9,1.77,2,0,2.92,1.05,3.06,3,.07,1,.75,1.26,1.6,1.14,1.34-.18,2.66-.47,4-.65a2.76,2.76,0,0,1,2.61,1c1.24,1.36,3.9,1.77,5.08.33s2.63-1.43,4.15-1.45c1.72,0,3.44,0,5.23,0-.39.75-1.19.73-1.82.79-1.08.09-.88.43-.52,1.18.62,1.27,1.94,1,2.89,1.38a15.37,15.37,0,0,1,2.72,1.46c.82.57.47,1.52.15,2.31-.43,1.06.32,1.5,1,1.32,1.86-.5,3,.78,4.18,1.61s2.55,2,2.77,3.17c.33,1.8,1.4,2.39,2.6,3.3.8.61,1.85,1.19,2.22,2.31,0,.07.12.19.15.18,1.48-.4,2.85.59,4.4.23a8.68,8.68,0,0,1,5.92.27c1.08.52.7,1.47.18,2.16a5,5,0,0,0-1.06,3.42,4.34,4.34,0,0,0,.9,2.83,1.57,1.57,0,0,1,.35,1.67c-.55,1.24-.4,2.69-1.21,3.85-.17.24-.33.52,0,.78a.59.59,0,0,0,.81,0c.94-.81,2-.48,3-.2a1.35,1.35,0,0,0,1.75-.54c1.27-2.19,2.48-4.42,3.66-6.66a4.55,4.55,0,0,0,.23-1.35c1.84.66,2.5,1.52,2.47,3.53a13.51,13.51,0,0,0,1.41,5.1,6.47,6.47,0,0,0,1.62,1.71,2.94,2.94,0,0,1-.65,4.83c.35.12,1-.21,1,.2-.09,1.43,1.48,1.25,1.94,2.2s1.86.71,2.82.95,1.34.67,1,1.68a15,15,0,0,1-1,2.73c-.13.24-.34.59.1.73.28.09.53-.21.55-.42.2-2.33,2-2.69,3.75-3a1.05,1.05,0,0,1,.61,0c2.33,1,4.71,2,7,3.22.88.47,1.16.4,1.34-.55a18.19,18.19,0,0,1,2.3,4.15,1.55,1.55,0,0,0,1.81.83c1.75-.93,3.15-.16,4.68.52a9.36,9.36,0,0,0,6.35.84,4.32,4.32,0,0,1,3.45.38c2.21,1.39,4.48,2.69,6.15,4.8a13.38,13.38,0,0,0,5,3.77,3.72,3.72,0,0,0,1.87.08c2.24-.13,3.13.42,3.75,2.57A26.75,26.75,0,0,1,336,183.9c.14,3.28-.25,6.49-2.36,9.24a23.54,23.54,0,0,0-1.47,2.21,4.86,4.86,0,0,1-1.6,1.94c-1.95,1.06-2.73,2.91-3.47,4.79a24.55,24.55,0,0,1-1.77,4.07c-.41.66-.78,1.33-1.87,1.17a1.5,1.5,0,0,0-1.16,1.4c0,.29,0,.59,0,.86.29,2.29-.51,4.62.24,6.89a9.06,9.06,0,0,1,0,5.38,6.67,6.67,0,0,0-.21,3.63A1.65,1.65,0,0,1,322,227a5.32,5.32,0,0,0-1.11,4.64c.22,1.11.34,2.27-.7,3.18-.27.24-.29.77-.42,1.17a7.78,7.78,0,0,1-1.58,3.09,4.13,4.13,0,0,0-.88,3.57,1.48,1.48,0,0,1-1.12,1.94c-1.13.38-2.11.88-1.93,2.39.06.53-.3.71-.91.71a29.48,29.48,0,0,0-6.61.84c-.27.06-.61.38-.75,0s.41-.39.62-.6c-.51.24-1.89-.62-1.29,1.07.09.25-.31.32-.55.4-.88.32-2.06.34-1.62,1.87.13.45-.34.56-.69.4-2.24-1-3.55.65-5,1.74a13.8,13.8,0,0,1-1.55,1.27,3.38,3.38,0,0,0-1.56,1.76c-.2.5-.3,1.44-1.33,1.06-.2-.07-.38.16-.32.28.47,1,0,2.12,0,3.05a8.15,8.15,0,0,0,.78,4.09c.91,1.81-.08,3.29-.14,4.91a1.31,1.31,0,0,1-.59,1.08c-2,1.33-2.71,3.41-3.16,5.59a12.47,12.47,0,0,1-3.91,7.1,5.27,5.27,0,0,0-2.18,4,.5.5,0,0,1-.06.24c-1.5,2.54-2.37,5.48-4.65,7.5a3.12,3.12,0,0,1-3.22.62,4.06,4.06,0,0,0-2.34.05c-1.37.3-2.55-.59-3.74-1.11a3.54,3.54,0,0,0-2.26-.54c-1.12.23-1.56-1-2.54-1.43a1.52,1.52,0,0,0,.92,1.95c.89.49,1.82.91,2.7,1.41,1.12.63,1.83,1.44,1.45,2.89a2.24,2.24,0,0,0,1.48,2.4,2.22,2.22,0,0,1,1.63,2.78,6.39,6.39,0,0,1-.84,2,4.63,4.63,0,0,0-.89,2.34c0,.77-.64,1.15-1.22,1.51-2,1.26-4.38,1.53-6.65,2a11.74,11.74,0,0,1-5.57.32c0,.45.89,1-.17,1.14,0,0-.06.28,0,.34.86,1,.2,2,.12,3a1.58,1.58,0,0,0,.49,1.44c.85.83.71,1.63-.39,2.22a5.62,5.62,0,0,1-4.79.27c-.83-.31-1.69-.54-2.51-.89s-1.08.2-.77.73c.68,1.18,1.08,2.47,1.67,3.67.44.87,1.72.95,2.49,1.61,0,0,.46.06.3-.17-.67-1,.33-.87.68-1a1.09,1.09,0,0,1,1.39.6,10.09,10.09,0,0,1,.62,1.52c.2.6-.09,1.13-.66,1.13-1.13,0-1.69.89-2.46,1.41a1.91,1.91,0,0,0-.65,2.37c.35,1.08,1.36,2.17.25,3.37.79,1.72-.68,1.32-1.45,1.5a3.65,3.65,0,0,0-2.95,3.31,2.13,2.13,0,0,0,.1.87c.45,1.39,3.75,3.6,5.22,3.53,1.75-.09,2.65.72,2.68,2.42,0,.3-.07.59.14.85.45.55.18.95-.29,1.27a13.8,13.8,0,0,0-1.46,1.4c-1.4,1.27-1.94,2.66-1.1,4.49.45,1,0,1.72-1,2.06-1.74.56-1.95,2.27-.77,3.65a29.2,29.2,0,0,0,3.7,3.92,1,1,0,0,1,.45,1.07c-.74-.16-1.47-.32-2.2-.46-.21,0-.45-.05-.55.2s.11.38.28.49c.36.22.7.59,1.15.48,1.42-.36,2.27.57,3,1.43a21,21,0,0,0,10,6.21,9.45,9.45,0,0,0,1.76.16c.41,0,.8.11.83.6s-.33.72-.8.77c-.92.1-1.84.25-2.76.3s-1.14.36-.32,1.12a12.78,12.78,0,0,1-3.81-.11c.12.58.9.69.82,1.55-1-.69-2.21-.55-3.17-1.22-.2-.13-.42-.44-.61-.1-.51.91-1.15.37-1.76.23-.33-.08-.41-.83-1.05-.26-.2.18-.69-.56-.58-1.24-1,1.19-2.05.53-2.75.05-.39-.26-2.07.48-1.38-1.2.05-.13-1.17-.26-1.75-.13s-.91.21-1-.45.54-.61.94-.66,1.07,0,1.62-.11c-.66-.19-1.38.09-2-.41-.3-.26-.4.1-.58.25s-.53.55-1,.57c-1,.06-1-1.06-1.53-1.38s-1.45.66-1.47-.9c-.65.83-1.21,1.52-1.53.08-.09-.4-.54-.41-.72-.64-.43-.55-1.73-.31-1.41-1.62.07-.27-.71-.47-1.17-.58a4.52,4.52,0,0,1-2.88-1.64,43,43,0,0,0,4.25,1.13c.16-.54-1.45-.15-.59-1.13.1-.11-.64-.24-.76-.19-.65.25-1-.05-1.2-.56a.9.9,0,0,0-.74-.56c-1.26-.27-1-2-2.2-2.38,0,0-.05-.09,0-.11.22-.39,1-.88.51-1.13a3.68,3.68,0,0,1-1.37-1.13c-.14,1.31-1.36.95-1.83,1.68-.17.26-.45-.12-.5-.35s-.28-.74.23-1l1-.49a4.49,4.49,0,0,1-1.57-1.08c-.24-.23-.52-.87-1.19-.36-.27.2-.58-.32-.71-.71s-.21-.76-.35-1.13c-.81-2.25-2.73-3.81-3.65-6-.35-.84,0-1.86-.8-2.56-.25-.22.17-.34.39-.45,1.58-.74,1.84-2.24,2.05-3.73.08-.59-.44-.63-.88-.63a3.11,3.11,0,0,1-2.4-.92c-.43-.45-.67-.35-.7.23,0,.32.22.75-.27.82s-.77-.28-.95-.69a1.43,1.43,0,0,1,.64-1.86c.47-.36.7-.63.14-1.16s.37-1.75,1.2-2.21c.23-.12.74.12.68-.28s-.41-.35-.76-.08-.41-.18-.37-.34c.33-1.14-.56-1.51-1.23-2a2.21,2.21,0,0,1-.37-.46c.75-.3,1.61-.51.91-1.57-.21-.31.17-.53.42-.67s.48,0,.6.28.26.62.42.92-.52.78.25.68c.45-.07,1,.56,1.33-.18.15-.34.34-.71-.07-1.14s-1.13-1-.27-1.67c.05,0,0-.27,0-.35-1.18-1.46-.27-3.4-1.16-4.95a1,1,0,0,1,0-1.29.3.3,0,0,0-.18-.5c-.74-.13-.79-.6-.71-1.22.05-.35-.28-.49-.57-.58s-.37.19-.54.37a1.36,1.36,0,0,0-.19,2.05c.56.86.17,2.16,1,3.1a1.65,1.65,0,0,1-.74,1.74c-.77.26-1.87,0-2-.87-.25-1.71-1-3.34-1-5.09,0-.29-.18-.58.37-.54.76.06.44-.38.19-.64-2.12-2.14-2.34-4.68-1.61-7.45a3.51,3.51,0,0,0-.69-3.11,29,29,0,0,1-3.13-6.4c-.22-.52-.39-1.12.56-1.12.46,0,.48-.34.49-.72a29.46,29.46,0,0,1,.72-7.19,5,5,0,0,0,.09-2.14,5.45,5.45,0,0,1,.3-3.71.84.84,0,0,0,.05-.5c-.6-3.18-.77-6.47-2.29-9.44a10.21,10.21,0,0,1-.74-2.16,2.36,2.36,0,0,1,.07-1.86,3.26,3.26,0,0,0-.3-3.9,2.48,2.48,0,0,1-.33-2.6c.65-1.67.18-3.47.47-5.19.13-.74-.11-1.55,0-2.28a6.62,6.62,0,0,0-.25-3.61,2,2,0,0,1,.18-2,1.09,1.09,0,0,0,.11-1.2,13.68,13.68,0,0,1-.75-5.71c0-.22.06-.45-.13-.58-1.16-.84-.77-1.66-.08-2.58a3.1,3.1,0,0,0,.35-1.72,44.91,44.91,0,0,0-.71-7.41c-.35-2.87-1.34-5.59-1.6-8.44a1.72,1.72,0,0,0-.81-1.22,18.52,18.52,0,0,1-3.85-3.41,9.83,9.83,0,0,0-3.89-2.77,43.75,43.75,0,0,1-9.07-5c-2.2-1.64-4.45-3.49-5.53-6.25-.06-.15-.24-.32-.21-.45.66-2.92-1.66-4.56-2.89-6.66a3,3,0,0,1-.51-1,2.65,2.65,0,0,0-.45-1.18c-3-3.68-4.41-8.15-6.41-12.33a12.15,12.15,0,0,0-.9-1.52,24,24,0,0,1-2.29-3.8,8.65,8.65,0,0,0-4.67-4.29c-1.42-.63-1.48-.84-.45-2,.35-.4.15-.69,0-1-2.39-4.46-1.49-5.83,2.52-9a2.81,2.81,0,0,0,1.08-2.16c-1,1.68-1.34,1.29-1.64.06-.15-.64-.84-1-1.44-1.36s-.88-.56-.48-1.44c.5-1.12.06-2.46-.09-3.69-.05-.44-.24-.88.25-1.09a1.88,1.88,0,0,0,1.12-2,1.17,1.17,0,0,1,.19-.72,3.52,3.52,0,0,0,1.12-3.67c-.18-.65.46-.93,1-1.15.86-.38,1.73-.7,2.58-1.08.63-.28,1.16-.59.51-1.41-.48-.6,0-1,.52-1.12s.89-.35.66-1a1.12,1.12,0,0,1,.89-1.56c1.92-.15,2.6-1.53,3.33-3,.29-.56.6-1.12.93-1.66.14-.23.3-.5.09-.69-1-.95-.35-2.08-.3-3.12a13.8,13.8,0,0,0-.09-2.65c-.11-.79-.46-1.58.34-2.22a.25.25,0,0,0,.08-.23c-.49-2-.21-4.3-2.06-5.85a4.65,4.65,0,0,1-1.35-2.26,1.4,1.4,0,0,1-.11-.74c.14-.58,1.37-1,0-1.78-.63-.37-1-1.4-1.82-1.83a1.83,1.83,0,0,0-2.49.81,3,3,0,0,1-1.86,1.78c-.82.18-.68.57-.38,1.08l.07.11c1.26,2,1.27,2.07-.94,3-.66.28-1.46.57-1.65-.59-.09-.6-.64-.2-.9-.43-.09-.5.61-.43.6-.87-.06,0-.15,0-.18,0a1,1,0,0,1-1.82-.49,2.72,2.72,0,0,0-3.36-1.6c-1.07.24-1.65.58-2-.69a1.88,1.88,0,0,1-.43.16c-1.16,0-1.75-.69-1.29-1.75a1,1,0,0,0-.37-1.42,6.08,6.08,0,0,0-1.36-.93,2.32,2.32,0,0,1-1.85-2.19c-.6.58-.72,1.69-1.78,1.05-1.92-1.15-2.5-2.15-1.88-3.32a3.51,3.51,0,0,0-.46-3.53c-1.8-1.58-2.79-3.84-4.63-5.38a1.22,1.22,0,0,1-.46-1.36c.16-.48.54-.26.86-.21-.46-1.16-.46-1.16-1.53-.43a.91.91,0,0,1-.83.21c-1.21-.49-2.62-.19-3.75-1a2.25,2.25,0,0,0-1.19-.36,2.58,2.58,0,0,1-1.79-.78,3.29,3.29,0,0,0-2.9-.94,3.43,3.43,0,0,1-2.91-1,17.88,17.88,0,0,1-3.48-3.82,11.08,11.08,0,0,0-3.19-3.38c-1.46-.95-3.18-1.6-5-.41A15.63,15.63,0,0,1,120.8,91a5,5,0,0,1-3.78-.08A18.41,18.41,0,0,1,111.21,88a.87.87,0,0,0-.46-.2c-2.19-.18-3.88-1.63-5.85-2.34a3,3,0,0,1-1.42-.81c-1.33-2-3.34-2.58-5.51-3a4.26,4.26,0,0,1-2.81-2.2,7.51,7.51,0,0,0-2.94-2.31c-1.69-1-2.25-2.65-2.63-4.41,0-.19,0-.55.12-.6,1.31-.56.83-2.14,1.74-2.94a1.21,1.21,0,0,0,.08-1.81,3.06,3.06,0,0,1-.48-2.19,4.07,4.07,0,0,0-.77-2.75c-1.63-2.26-2.74-4.89-4.92-6.75a1.94,1.94,0,0,1-.57-.82,6.13,6.13,0,0,0-2.9-3.43c-1.23-.79-1.29-1.39-.5-2.56s.58-1.09-.46-2.13c-.75-.74-2.08-1.73-2.06-2.38,0-1.68-1-2.31-1.89-3.3a8.15,8.15,0,0,1-1.84-3.57c-.43.39-.55,1.26-1.23.77s-.08-1,.19-1.39a1.84,1.84,0,0,0,.44-1.64c-.37-1.4-.05-2.88-.47-4.28a.54.54,0,0,1,0-.37c.89-1.46-.16-2.26-1-3.13-.16-.16-.31-.34-.52-.24-.76.38-1.29,0-1.79-.49s-.66-.3-1,.22c-.75,1.09-.48,2.36-.82,3.49a4.68,4.68,0,0,0,.94,4.75c1,1.29,1.53,3.05,2.26,4.6a.36.36,0,0,1,0,.25c-.77,2.39,1.18,3.89,2,5.75.28.66.76,1.26.63,2-.16.89,1,1.26.82,1.85a2.54,2.54,0,0,0-.24,2c.23.65-.11,1.43,1,1.66.32.07.2.65-.2.92a1.56,1.56,0,0,0-.55,1.58c0,.39.35.92.69.67.82-.59,1,.14,1.41.48.92.85,1,2.13,1.38,3.2.29.73-1.48,2.14-2.26,1.93-.5-.14-.5-.59-.64-1a7.32,7.32,0,0,0-4.35-4.86c-1.38-.53-1.9-1.5-1.3-2.8.34-.73.58-1.5.89-2.24A1.92,1.92,0,0,0,71,49.16c-.63-.89-1.68-1.42-2.2-2.43a.28.28,0,0,0-.22-.11c-2.66,0-3.35-2.51-4.88-3.93-.41-.38-.18-.8.47-.74a2.1,2.1,0,0,1,.24.06c.71.13,1.73.23,2-.22.59-1.07,1.82-2.1.68-3.64a11.91,11.91,0,0,0-2-2.55,3,3,0,0,1-1.27-2.94A16.46,16.46,0,0,0,63.36,28c-.29-1.53-.1-3.07-.28-4.6-.06-.46.28-.57.64-.61l7.06-.71c.26,0,.66,0,.65.25-.08,1.2.94,1.16,1.6,1.45,2.75,1.2,5.53,2.35,8.3,3.53a3.43,3.43,0,0,0,1.35.28l7.37,0c.7,0,1.29,0,1.27-1,0-.71.5-.8,1.05-.8h4.95a1.46,1.46,0,0,1,1.29.64,17.85,17.85,0,0,0,3.11,3.78,2.29,2.29,0,0,1,.59,2.37,2.91,2.91,0,0,0,1.55,3.29l.42.28c1.74,1.16,2,1.15,3.09-.61,1-1.6,2.29-2,4.09-1.79A3.91,3.91,0,0,1,115,37.15c.54,2.09.86,4.22,2.21,6,.26.34.06.73,0,1.1a4.14,4.14,0,0,0,3.68,4.68c1,0,1.74,1.37,2.88.23Zm80,65.07c0,1.2.65,1.7.94,2.39.39.94.94,1,1.59.25a3.44,3.44,0,0,0-.67-4.35c-.15-.11-.32-.18-.46-.06C204.6,113.44,203.94,114,203.86,114.62Zm83.82,162.75c-.94.41-1.86.57-1.76,1.94a2.63,2.63,0,0,1-1,2c-.29.25-.63.49-.69.88s-.39.8,0,1.07.8-.05,1.09-.37A9,9,0,0,0,287.68,277.37Zm-37.14,94.07c.84.63,1.35.45,1.51-.51s.58-.87,1.15-.31c.15.14.3.65.5.33.4-.62,1.24-.56,1.57-1.19.08-.16-.11-.31-.3-.31a5.1,5.1,0,0,0-.87.07c-1.92.36-2.29.09-2.47-1.84a.71.71,0,0,0-.84-.71c-.47,0-.36.45-.32.8a5.75,5.75,0,0,0,.86,2.22C251.78,370.78,251.68,371.39,250.54,371.44ZM155.24,107a2.77,2.77,0,0,0,2.39,2.69c.77.1.9-.25.6-.89a6.08,6.08,0,0,0-1.94-2.3c-.23-.17-.45-.44-.78-.28S155.27,106.67,155.24,107Z"/><path d="M174.8,63.25c-1.44-.3-2.78-.45-4.05.46-.92.66-1.71,1.56-3,1.46a.57.57,0,0,0-.43.22c-1,1.38-2.37,1.13-3.76.87,0-.11,0-.24,0-.26a4.7,4.7,0,0,0,2.19-2.11c.92-1.71,2.94-2,4.69-2.45.61-.15,1.24-.24,1.86-.39a16,16,0,0,1,9.55,1,1.88,1.88,0,0,1,.7.7A2.71,2.71,0,0,0,184.92,64c.93,0,1.58.72,2.72,1.09a2.26,2.26,0,0,0-1.22-1c-.25-.06-.57-.14-.48-.46a.57.57,0,0,1,.74-.32,2.51,2.51,0,0,1,1.4,1,31.93,31.93,0,0,0,3.15,3.22c.91,1,2.27,1.13,3.51,1.46.31.08.85,0,.83.38-.08,1.33.86,1.14,1.65,1.25,1.3.19,1.94,1.43,3.05,2,.38.18-.1.61-.38.72-1.38.54-2.83,1.2-4.27,1a15.45,15.45,0,0,0-5.91.16h-.13c-.68,0-1.69.42-2-.28s.72-1.08,1.32-1.44c.4-.24.83-.44.65-1.06s-.66-.51-1.12-.51c-1.93,0-2.73-.68-3.1-2.6-.17-.84-.49-1.27-1.48-1a4.15,4.15,0,0,1-3.44-.93A6.92,6.92,0,0,0,177,65.41a8.68,8.68,0,0,0-1.84-.35c-.6,0-1.33-.19-1.49-.77C173.4,63.46,174.55,64,174.8,63.25Z"/><path d="M216.83,77.55a3,3,0,0,1,2.76,1.07c.5.67.61,1.18-.09,1.72a1.33,1.33,0,0,0-.59.78c-.15.68-.48.44-.76.1-.73-.87-2.93-1.4-3.8-.79s-1.68,1-2.76.34c-.47-.29-1.06.06-1.39.57-.13.22-.19.48-.33.69-.33.52-.52,1.34-1.19,1.37s-.77-.77-1.06-1.27a2,2,0,0,0-2.28-1,6.83,6.83,0,0,1-2.51,0c-.62-.09-1.29-.56-1.86.41-.32.56-2.84-.79-2.79-1.52s.65-1.08,1.44-1c1.26.12,2.42.74,3.7.74a5.15,5.15,0,0,0,.88,0c1.41-.32,1.41-.33.57-1.52-.09-.14-.25-.29-.24-.43,0-1.33-.17-2.37-1.8-2.63-.52-.08-.18-.63.12-.87.63-.52,1.55-.34,2.18-.89.06-.05.37,0,.44.14.88,1.36,2,1,3.25.62a5,5,0,0,1,2.83-.12c1.33.5,3.09.34,3.82,2,.17.41.64.32,1,.23s.71-.2.93.13C217.65,77,216.94,77,216.83,77.55Z"/><path d="M187,79.68c1.57-.15,2.87.64,4.21,1.25.47.22.9.71.71,1.22s-.82.52-1.33.36a1.78,1.78,0,0,0-1.36.08,2.85,2.85,0,0,1-3.42-.73,3.17,3.17,0,0,0-.49-.4c-.36-.22-1-.19-.89-.85s.69-.72,1.19-.82A10.55,10.55,0,0,1,187,79.68Z"/><path d="M287.94,363c0-.09,0,.09-.06.1-1.45.29-2.27,1.66-3.66,2.08a1.54,1.54,0,0,1-1.61-.29c-.37-.35.1-.87.26-1.26.24-.57.71-1,.71-1.72a.5.5,0,0,1,.16-.34c1-.92,2,0,3,0C287.39,361.55,287.84,362.06,287.94,363Z"/><path d="M225.53,79.46c1.07.17,2.18.34,3.3.55.59.11.72.52.48,1A1.69,1.69,0,0,1,228,82.11a20.74,20.74,0,0,1-2.5.24c-1.5,0-2-.43-1.94-1.82S224.72,79.63,225.53,79.46Z"/><path d="M278.7,361.51c1.22.06,2.29-1,3.61-.27.74.39.86.73.49,1.48a5.51,5.51,0,0,1-2.24,2.15c-.69.43-2.36-.43-2.62-1.26a.36.36,0,0,1,.09-.46c.2-.14.38,0,.58.1s.33,1,.84.5a1.67,1.67,0,0,0-.28-1.6C279,362,278.71,361.92,278.7,361.51Z"/><path d="M239.76,114c.27-.57.68-.63,1-.84a1,1,0,0,0,.5-1.08c-.2-1.09.58-1.71,1.67-1.34a.74.74,0,0,1,.33.17c.52.58-.27,3.07-1,3.16A7.34,7.34,0,0,1,239.76,114Z"/><path d="M190.45,54.69a1.56,1.56,0,0,1-1.13,1.54c-.68.19-1-.43-1.43-.81-.23-.21,0-.43.1-.65a7.05,7.05,0,0,0,.65-1.21c.14-.32,0-.85.49-.9s.77.41.92.87S190.32,54.32,190.45,54.69Z"/></g></svg> --}}
                                {{-- @if ($category->showcase->svg)
                                    <object class="outline-svg h-1/5 inline" data="{{ asset('storage/' . $category->showcase->svg) }}" type="image/svg+xml" style="filter: brightness(0) invert(1);">
                                        <img class="h-2/4" src="{{ asset('storage/' . $category->showcase->svg) }}">
                                    </object>
                                @endif --}}
                                <img class="outline-svg max-h-96 inline" src="{{ asset('storage/' . $category->showcase->svg) }}" style="z-index: -1">
                            </div>

                            <div class="block-continent-slider__content">
                                <p class="block-continent-slider__subheading js-subheading">{!! $category->subtitle !!}</p>
                                <h2 class="block-continent-slider__heading js-heading">{!! $category->title !!}</h2>
                            </div>

                            <a href="{{ route('front.category', ['friendly' => $category->friendly]) }}" class="button-outline block-continent-slider__button js-button py-3">
                                <span class="button-outline__label js-label">
                                    {{ __('Discover') }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="block-continent-slider__footer">
                    <p class="block-continent-slider__location js-location flex align-middle items-center"
                        @foreach ($categories as $category)
                            data-continent-location-{{ $category->friendly }}="@if ($category->image && $category->image->tag) {{ $category->image->tag }} @else {{ $category->title }} @endif"
                        @endforeach
                    data-continent-default-location="Habana Vieja, Cuba"
                    >
                        <img data-src="{{ asset('front-template/assets/img/icons/icon-location.svg') }}" alt="icon location" area-hidden="true" class="block-continent-slider__location-icon lazyload" width="10" height="15" />
                        <span class="js-label">Habana Vieja, Cuba</span>
                    </p>

                    <div class="scroll-indicator block-continent-slider__scroll-indicator js-scroll-indicator" >
                        <span class="scroll-indicator__background js-background"></span>
                        <span class="scroll-indicator__highlight js-highlight"></span>
                    </div>
                </div>

                <canvas class="block-continent-slider__overlay js-overlay"></canvas>
            </section>
        @endif

        @foreach ($homemenus as $menu)
            @if (count($menu->links))
                <section class="block block-featured-travel-style" data-block-type="featured-travel-style" data-component="block-featured-travel-style">
                    <div class="block-featured-travel-style__content">
                        <div data-component="parallax" data-parallax-offset="30" data-parallax-direction="-1" class="" style="transform: translate3d(0px, 1.8562px, 0px); will-change: transform;">
                            <h3 class="block-featured-travel-style__subheading js-subheading" style="visibility: inherit; opacity: 1;">{{ $menu->subtitle }}</h3>
                            <h2 class="block-featured-travel-style__heading js-heading" style="opacity: 1; visibility: inherit; transform: translate(0px, 0px);">{{ $menu->title }}</h2>
                        </div>
                        <div class="block-featured-travel-style__carousel js-carousel">
                            <ul class="block-featured-travel-style__list js-carousel-list">
                                @foreach ($menu->links as $link)
                                    @if ($link->menuable->enabled)
                                        <li class="featured-travel-style block-featured-travel-style__item js-featured-travel-style js-carousel-item" style="transform: translate3d(0px, 28.4331px, 0px); will-change: transform;">
                                            <div class="featured-travel-style__image-wrapper js-container">
                                                <div class="responsive-image responsive-image--parallax featured-travel-style__image js-image">
                                                    <picture class="responsive-image__picture" data-component="parallax" data-parallax-offset="100" data-parallax-direction="-1" data-parallax-start="-50" style="transform: translate3d(0px, -73.773px, 0px); will-change: transform;">
                                                        @if (isset($link->menuable->image)) <img class="responsive-image__img lazyloaded" data-src="{{ asset('storage/' . $link->menuable->image->url) }}" alt="{{ $link->menuable->title }}" src="{{ asset('storage/' . $link->menuable->image->url) }}"> @endif
                                                    </picture>
                                                </div>
                                            </div>

                                            <h4 class="featured-travel-style__heading">{{ $link->menuable->title }}</h4>
                                            <p class="featured-travel-style__paragraph">@if (isset($link->menuable->content)) {!! $link->menuable->content !!} @endif</p>

                                            <a href="{{ $link->menuable->frontLink() }}" class="button-outline button-outline--inverted button featured-travel-style__button" style="display: flex; margin-top: 1em">
                                                <span class="button-outline__label js-label">
                                                    Descubrir más
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="scroll-indicator block-featured-travel-style__scroll-indicator js-scroll-indicator">
                            <span class="scroll-indicator__background js-background"></span>
                            <span class="scroll-indicator__highlight js-highlight"></span>
                        </div>
                    </div>
                </section>
            @endif
        @endforeach

        @if (count($blogs) > 0)
            <section class="block block-featured-story" data-block-type="featured-story" data-component="block-featured-story">
                <div class="block-featured-story__content">
                    <div data-component="parallax" data-parallax-offset="30" data-parallax-direction="-1">
                        <h3 class="block-featured-story__subheading js-subheading">{!! $template->content !!}</h3>
                        <h2 class="block-featured-story__heading js-heading">{!! $template->title !!}</h2>
                    </div>
                    <ul class="block-featured-story__list">
                        @foreach ($blogs as $blog)
                            <li class="featured-story block-featured-story__item js-featured-story">
                                <div class="featured-story__image-wrapper">
                                    <div class="responsive-image responsive-image--parallax featured-story__image js-image">
                                        <picture class="responsive-image__picture " data-component="parallax" data-parallax-offset="100" data-parallax-direction="-1" data-parallax-start="-50">
                                            <source media="(min-width: 768px)" data-srcset="{{ asset('storage/' . $blog->image->url) }}" type="image/webpjpg">
                                            <img class="responsive-image__img lazyload" data-src="{{ asset('storage/' . $blog->image->url) }}" alt="{{ $blog->title }}">
                                        </picture>
                                    </div>
                                </div>
                                <h4 class="featured-story__heading">{!! $blog->title !!}</h4>
                                <h5 class="featured-story__subheading">{{ $blog->created_at }}</h5>
                                <a href="{{ route('front.blog', ['friendly' => $blog->friendly]) }}" class="button-arrow button-arrow--inverted button-arrow--reversed story__button">
                                    <span class="button-arrow__label">
                                        {{ __('Details') }}
                                        <span class="button-arrow__icon"></span>
                                    </span>
                                    <span class="button-arrow__line"></span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('front.group', ['friendly' => $blog->menu->menu->friendly]) }}" class="button-outline button-outline--inverted block-featured-story__button" style="width: 28%">
                        <span class="button-outline__label js-label">
                            {{ __('See all elements') }}
                        </span>
                    </a>
                </div>
            </section>
        @endif

    </article>
</main>
@endsection
