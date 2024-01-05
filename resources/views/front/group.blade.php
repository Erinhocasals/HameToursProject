@extends('layouts.frontend.global')

@php
    $logo = "logo-black.png";
@endphp

@prepend('styles')
<link rel="stylesheet" href="{{ asset('front-template/css/custom.css') }}">
@endprepend

@prepend('scripts')
    <script src="{{ asset('front-template/js/block-featured-story.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/custom.js') }}"></script>

    <script>
        var ENDPOINT = "{{ url('/') }}";
        var page = 1;

        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

        function loadMore() {
            document.getElementById('label-load').style.opacity = 0;
            document.getElementById('btn-load').disabled = true;
            document.getElementById('btn-load').classList.add('button--loading');

            axios.get(ENDPOINT + "/group/{{ $menu->friendly }}/?page=" + page)
            .then(function (response) {
                if(response.status == 200) {
                    page++;
                    if (response.data == "") {
                        document.getElementById('btn-load').classList.add('hidden');
                    } else {
                        var html = document.getElementById('data-wrapper').innerHTML.replaceAll("load-animation", "");
                        document.getElementById('data-wrapper').innerHTML = html + response.data;
                    }
                }

                document.getElementById('label-load').style.opacity = 1;
                document.getElementById('btn-load').disabled = false;
                document.getElementById('btn-load').classList.remove('button--loading');
            })
            .catch(function (error) {
                console.log(error)
            })
        }
    </script>
@endprepend

@section('content')
<main id="content" class="content js-main" data-track-id="page">
    <article class="page-generic" data-view="pages/generic">
        <header class="block-hero" data-component="block-hero">
            <div data-component="parallax" data-parallax-offset="30" data-parallax-direction="-1">
                <h3 class="block-featured-story__subheading js-subheading">{!! $menu->title !!}</h3>
                <h2 class="block-featured-story__heading js-heading">{!! $menu->subtitle !!}</h2>
            </div>
        </header>

        <section class="block block-featured-story" data-block-type="featured-story" data-component="block-featured-story">
            <div class="block-featured-story__content">
                <ul class="block-featured-story__list" id="data-wrapper">
                    @foreach ($links as $link)

                        @if ($link->menuable)
                            <li class="featured-story block-featured-story__item js-featured-story">
                                @if (isset($link->menuable->image))
                                    <div class="featured-story__image-wrapper">
                                        <div class="responsive-image responsive-image--parallax featured-story__image js-image">
                                            <picture class="responsive-image__picture " data-component="parallax" data-parallax-offset="100" data-parallax-direction="-1" data-parallax-start="-50">
                                                <source media="(min-width: 768px)" data-srcset="{{ asset('storage/' . $link->menuable->image->url) }}" type="image/webp">
                                                <img class="responsive-image__img lazyload" data-src="{{ asset('storage/' . $link->menuable->image->url) }}" alt="{{ $link->menuable->title }}">
                                            </picture>
                                        </div>
                                    </div>
                                @endif

                                <h4 class="featured-story__heading">{{ $link->menuable->title }}</h4>
                                <h5 class="featured-story__subheading">{{ $link->menuable->created_at }}</h5>

                                {!! $link->menuable->summary !!}

                                <a href="{{ $link->url }}" class="button-arrow button-arrow--inverted button-arrow--reversed story__button">
                                    <span class="button-arrow__label">
                                        {{ __('Details') }}
                                        <span class="button-arrow__icon"></span>
                                    </span>
                                    <span class="button-arrow__line"></span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>

                <button id="btn-load" onclick="loadMore()" class="button-outline button-outline--inverted block-featured-story__button mt-5 flex items-center justify-center max-w-max">
                    <span id="label-load" class="button-outline__label js-label">
                        {{ __('Load More') }}
                    </span>
                </button>
            </div>
        </section>

    </article>
</main>
@endsection
