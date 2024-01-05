@extends('layouts.frontend.global')

@php
    $logo = "logo-black.png";
@endphp

@prepend('styles')
<link rel="stylesheet" href="{{ asset('front-template/css/custom.css') }}">
@endprepend

@prepend('scripts')
    <script src="{{ asset('front-template/js/custom.js') }}"></script>
@endprepend

@section('content')
<main id="content" class="content js-main" data-track-id="page">
    <article class="page-generic" data-view="pages/generic">
        <header class="block-hero" data-component="block-hero">
            <h2 class="block-hero__subheading js-subheading">
                {{ $info->menu->menu->title }}
            </h2>

            <h1 class="block-hero__heading js-heading">
                {{ $info->title }}
            </h1>
        </header>

        @include('front.includes.intro', ['intro' => $info->intro])

        {{-- Section Image Division --}}
        {{-- @if ($info->image)
            <div class="block-image block-image--wide mb-32">
                <div class="responsive-image responsive-image--full-width block-image__container">
                    <picture class="responsive-image__picture ">
                        <source media="(max-width: 768px)"
                                data-srcset="{{ asset('storage/' . $info->image->url) }}"
                                type="image/webp">
                        <img class="responsive-image__img lazyload"
                            data-src="{{ asset('storage/' . $info->image->url) }}"
                            alt="{{ $info->title }}">
                    </picture>
                </div>
            </div>
        @endif --}}

        <section class="block-copy pt-32 pb-32 bg-white " data-component="block-copy" style="width: 100%">
            {!! $info->content !!}
        </section>

        @include('front.includes.texts', ['texts' => $info->texts])

    </article>
</main>
@endsection
