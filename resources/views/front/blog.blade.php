@extends('layouts.frontend.global')

@php
$logo = 'logo-white.png';
@endphp

@prepend('styles')
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/comment.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/button.min.css" rel="stylesheet">
    <link href="{{ asset('/vendor/laravelLikeComment/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('front-template/css/socials.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin-template/icons/fontawesome-free-6.0.0-beta2-web/css/all.min.css') }}"/>

    <style>
        nav {
            background-color: #0000006e;
            box-shadow: rgb(0, 0, 0) 0px 0px 10px !important;
        }
    </style>
@endprepend

@prepend('scripts')
    <script src="{{ asset('front-template/js/block-story-hero.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/block-copy.bundle.js') }}"></script>
    <script src="{{ asset('front-template/js/custom.js') }}"></script>

    <script src="{{ asset('/vendor/laravelLikeComment/js/script.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/share.js') }}"></script>
@endprepend

@section('content')
    <main id="content" class="content js-main" data-track-id="page">
        <article class="page-story" data-view="pages/story">
            <header class="block-story-hero mb-40" data-component="block-story-hero">
                <div class="responsive-image responsive-image--object-fit block-story-hero__image">
                    <picture class="responsive-image__picture ">
                        <source media="(min-width: 768px)"
                            srcset="{{ asset('storage/' . $blog->image->url) }}" type="image/jpg">
                        <img class="responsive-image__img"
                            src="{{ asset('storage/' . $blog->image->url) }}"
                            alt="{{ $blog->title }}">
                    </picture>
                </div>

                <div class="block-story-hero__container">
                    <h1 class="block-story-hero__heading mb-5">
                        {{ $blog->title }}
                    </h1>

                    <h6 class="font-bold mb-3">{{ $blog->created_at }}</h6>

                    {!! $blog->summary !!}

                    <div class="block-story-hero__container-author">
                        <span class="mb-5 text-uppercase">{{ __('Share With') }}</span>
                        <div class="block-story-hero__text-upper">
                            {!! $socialShares !!}
                        </div>
                    </div>
                </div>
            </header>

            {{-- Section Intro --}}
            @if ($blog->intro)
                <section class="block-double-image-text" data-component="block-double-image-text">
                    <div class="block-double-image-text__container-copy">
                        <h3 class="block-double-image-text__subheading js-subheading">{{ $blog->intro->subtitle }}</h3>
                        <h2 class="block-double-image-text__heading js-heading">{{ $blog->intro->title }}</h2>
                        <div class="block-double-image-text__body-large js-body">{!! $blog->intro->content !!}</div>
                    </div>

                    <div class="block-double-image-text__container-images">
                        <div class="responsive-image responsive-image--object-fit block-double-image-text__image-big js-image-big">
                            <picture class="responsive-image__picture ">
                                <source media="(min-width: 768px)"
                                    data-srcset="{{ asset('storage/' . $blog->intro->big_image) }}"
                                    type="image/jpg">
                                <img class="responsive-image__img lazyload"
                                    data-src="{{ asset('storage/' . $blog->intro->big_image) }}"
                                    alt="{{ $blog->intro->title }}">
                            </picture>
                        </div>
                        <div class="responsive-image responsive-image--object-fit block-double-image-text__image-small js-image-small">
                            <picture class="responsive-image__picture ">
                                <source media="(min-width: 768px)"
                                    data-srcset="{{ asset('storage/' . $blog->intro->small_image) }}"
                                    type="image/jpg">
                                <img class="responsive-image__img lazyload"
                                    data-src="{{ asset('storage/' . $blog->intro->small_image) }}"
                                    alt="{{ $blog->title }}">
                            </picture>
                        </div>
                    </div>
                </section>
            @endif

           <section class="block-copy" data-component="block-copy">
                <div class="block-copy__container">
                    <div class="block-copy__body">
                        {!! $blog->content !!}
                    </div>
                </div>
            </section>

            <section class="block-copy pt-20" data-component="block-copy">
                <div class="block-copy__container">
                    <div class="block-copy__body">
                        @include('laravelLikeComment::comment', ['comment_item_id' => "blog-" . $blog->id])
                    </div>
                </div>
            </section>

        </article>
    </main>
@endsection
