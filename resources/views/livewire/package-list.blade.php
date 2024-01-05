@if (isset($packages) && count($packages) > 0)
    <section class="block block-highlighted-example-trips" data-block-type="highlighted-example-trips" data-component="block-highlighted-example-trips" style="background: linear-gradient(to top, rgb(255, 255, 255) 0%, #f1efec 100%);">

        @include('front.includes.svg-map', ['svgMap' => 'packages', 'opacity' => 0.8])

        <div class="block-highlighted-example-trips__content">
            <div class="highlighted-example-trips-summary not-wide">
                <h3 class="highlighted-example-trips-summary__headline">{!! $packagetemplate->subtitle !!}</h3>
                <h2 class="highlighted-example-trips-summary__heading">{!! $packagetemplate->title !!}</h2>
                <p class="highlighted-example-trips-summary__description">{!! $packagetemplate->content !!}</p>
            </div>
            <div class="block-highlighted-example-trips__carousel js-carousel" data-custom-cursor="drag">
                <ul class="block-highlighted-example-trips__list js-carousel-list">
                    <li class="block-highlighted-example-trips__item block-highlighted-example-trips__item--summary not-extra-narrow not-narrow not-regular js-carousel-item ">
                        <div class="highlighted-example-trips-summary">
                            <h3 class="highlighted-example-trips-summary__headline">{!! $packagetemplate->subtitle !!}</h3>
                            <h2 class="highlighted-example-trips-summary__heading">{!! $packagetemplate->title !!}</h2>
                            <p class="highlighted-example-trips-summary__description">{!! $packagetemplate->content !!}</p>
                        </div>
                    </li>
                    @foreach ($packages as $package)
                        <li class="block-highlighted-example-trips__item js-carousel-item">
                            <div class="highlighted-example-trip highlighted-example-trip--active block-highlighted-example-trips__trip js-highlighted-example-trip" data-id="1">
                                <div class="responsive-image responsive-image--object-fit highlighted-example-trip__background js-background">
                                    <picture class="responsive-image__picture ">
                                        @if ($package->image)
                                            <img class="responsive-image__img lazyload pkg-img" draggable="true" data-src="{{ asset('storage/' . $package->image->url) }}" alt="{{ $package->title }}">
                                        @endif
                                    </picture>
                                </div>

                                <span class="highlighted-example-trip__overlay"></span>

                                <div class="highlighted-example-trip__category js-category">
                                    @if (count($package->definitions) == 1)
                                        @if ($package->definitions->first()->showcase && $package->definitions->first()->showcase->svg)
                                            <div class="highlighted-example-trip__category-icon js-category-icon">
                                                <span class="highlighted-example-trip__category-highlight js-category-highlight"></span>
                                                <span class="highlighted-example-trip__category-circle js-category-circle"></span>
                                                {{-- <object class="outline-svg" data="{{ asset('storage/' . $package->definitions->first()->showcase->svg) }}" type="image/svg+xml"></object> --}}
                                                <img src="{{ asset('storage/' . $package->definitions->first()->showcase->svg) }}" alt="{{ $package->definitions->first()->title }}"  style="filter: invert(100%) sepia() saturate(10000%) hue-rotate(0deg)" />
                                            </div>
                                        @endif
                                        <p class="highlighted-example-trip__category-label js-category-label">
                                            {{ $package->definitions->first()->title }}
                                        </p>
                                    @endif
                                </div>

                                <a class="highlighted-example-trip__content text-white hover:text-white visited:text-white" href="{{ route('front.package', ['friendly' => $package->friendly]) }}" draggable="false">
                                    <h5 class="highlighted-example-trip__subheading">{!! $package->subtitle !!}</h5>
                                    <h4 class="highlighted-example-trip__heading">{!! $package->title !!}</h4>
                                    <p class="highlighted-example-trip__paragraph">{!! $package->summary !!}</p>

                                    <div class="highlighted-example-trip__action mt-3">
                                        <button class="button-outline highlighted-example-trip__button">
                                            <span class="button-outline__label js-label">
                                                {{ __('Discover') }}
                                            </span>
                                        </button>

                                        <p class="highlighted-example-trip__price" id="price-package-component-{{ $package->id }}">

                                        </p>
                                    </div>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <button class="block-highlighted-example-trips__button  block-highlighted-example-trips__button--previous js-button-previous  button-slider--flipped  button-slider--reversed button-slider" aria-label="Previous">
                    <svg class="button-slider__dashed-circle dashed-circle" width="42" height="42" viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="21" cy="21" r="20.5" fill="none" fill-rule="evenodd" stroke="currentColor" stroke-dasharray="2, 2" stroke-width="1"/>
                    </svg>

                    <svg class="button-slider__icon" width="7" height="10" viewBox="0 0 7 10" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.243.757L5.485 5 1.243 9.243" stroke="currentColor" stroke-width="1.5" fill="none" fill-rule="evenodd"/>
                    </svg>
                </button>

                <button class="block-highlighted-example-trips__button block-highlighted-example-trips__button--next js-button-next  button-slider--reversed button-slider" aria-label="Next">
                    <svg class="button-slider__dashed-circle dashed-circle" width="42" height="42" viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="21" cy="21" r="20.5" fill="none" fill-rule="evenodd" stroke="currentColor" stroke-dasharray="2, 2" stroke-width="1"/>
                    </svg>

                    <svg class="button-slider__icon" width="7" height="10" viewBox="0 0 7 10" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.243.757L5.485 5 1.243 9.243" stroke="currentColor" stroke-width="1.5" fill="none" fill-rule="evenodd"/>
                    </svg>
                </button>
            </div>

            <span class="block-highlighted-example-trips__footnote">
                    </span>

            <div class="scroll-indicator block-highlighted-example-trips__scroll-indicator js-scroll-indicator">
                <span class="scroll-indicator__background js-background"></span>
                <span class="scroll-indicator__highlight js-highlight"></span>
            </div>
        </div>
    </section>
@endif
