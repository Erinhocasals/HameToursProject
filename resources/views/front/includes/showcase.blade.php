<header class="block-hero-slider js-scroll-section" data-component="block-hero-slider" id="hero">
    <div class="block-hero-slider__carousel js-carousel carousel-masks" data-resources='[
            @foreach ($entity->showcase->images as $image)
                { "type": "image", "url": "{{ asset('storage/' . $image->url) }}"}@if (!$loop->last),@endif
            @endforeach
        ]'>

        <div class="responsive-image responsive-image--object-fit carousel-masks__placeholder">
            <picture class="responsive-image__picture ">
                <img class="responsive-image__img" src="{{ asset('storage/' . $entity->showcase->images->first()->url) }}" alt="{{ $entity->title }}">
            </picture>
        </div>

        <canvas class="carousel-masks__background js-background"></canvas>

        <div class="carousel-masks__container">
            @foreach ($entity->showcase->images as $image)
                <div class="carousel-masks__copy js-carousel-copy" data-index="{{ $loop->index }}">
                    @if ($image->tag)
                        <span class="block-continent-hero__label-icon label-icon flex">
                            <svg class="label-icon__icon" width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path d="M0 5.942C0 3.052 2.243.7 5 .7s5 2.352 5 5.242c0 3.497-3.978 8.52-5.004 9.758C3.963 14.496 0 9.633 0 5.942zm2.606-.488c0-1.389 1.082-2.518 2.41-2.518 1.329 0 2.41 1.13 2.41 2.518 0 1.389-1.081 2.519-2.41 2.519-1.328 0-2.41-1.13-2.41-2.519z" fill="currentColor" fill-rule="evenodd"/></svg>
                            <span class="label-icon__label">
                                {{ $image->tag }}
                            </span>
                        </span>
                    @endif
                </div>
            @endforeach
            <div class="scroll-indicator carousel-masks__scroll-indicator js-scroll-indicator">
                <span class="scroll-indicator__background js-background"></span>
                <span class="scroll-indicator__highlight js-highlight"></span>
            </div>
        </div>

        <canvas class="carousel-masks__cursor js-cursor"></canvas>

        <button class="carousel-masks__button-mobile js-button-mobile" aria-label="Show next slide"></button>
    </div>
    <div class="block-hero-slider__container">
        <div class="block-continent-hero__container-content">
            <div class="block-continent-hero-content">
                <h2 class="block-continent-hero__subheading js-subheading text-white">
                    {{ $entity->showcase->subtitle }}
                </h2>
                <h1 class="block-continent-hero__heading js-heading text-white">
                     {{ $entity->showcase->title }}
                </h1>
            </div>
            <div class="icon-continent__container icon-continent__container-{{ $entity->friendly }}">
                {{-- <object class="outline-svg" data="{{ asset('storage/' . $entity->showcase->svg) }}" type="image/svg+xml"></object> --}}
                @if ($entity->showcase->svg) <img class="outline-svg max-h-full" src="{{ asset('storage/' . $entity->showcase->svg) }}" style="z-index: -1"> @endif
            </div>
        </div>
        <div class="js-copy"></div>
    </div>
</header>
