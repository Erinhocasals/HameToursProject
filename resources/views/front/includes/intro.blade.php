@if (isset($intro) && $intro->enabled)
    <section class="block-continent-intro block-continent-intro--left" data-component="block-continent-intro">
        @if ($intro->big_image || $intro->small_image)
            <div class="block-continent-intro__container">
                <div class="block-continent-intro__copy">
                    <h3 class="block-continent-intro__subheading js-subheading">{!! $intro->subtitle !!}</h3>
                    <h2 class="block-continent-intro__heading js-heading">{!! $intro->title !!}</h2>
                    <div class="block-continent-intro__body js-body">{!! Str::limit($intro->content, 900, '...')  !!}</div>
                </div>
                <div class="block-continent-intro__container-images mt-40">
                    @if ($intro->small_image)
                        <div class="responsive-image responsive-image--object-fit block-continent-intro__image-small js-image-small">
                            <picture class="responsive-image__picture " >
                                <source media="(max-width: 768px)" data-srcset="{{ asset('storage/' . $intro->small_image) }}" type="image/jpg">
                                <img class="responsive-image__img lazyload"  data-src="{{ asset('storage/' . $intro->small_image) }}" alt="Big Image">
                            </picture>
                        </div>
                    @endif
                    @if ($intro->big_image)
                        <div class="responsive-image responsive-image--object-fit block-continent-intro__image-big js-image-big">
                            <picture class="responsive-image__picture " >
                                <source media="(max-width: 768px)" data-srcset="{{ asset('storage/' . $intro->big_image) }}" type="image/webp">
                                <img class="responsive-image__img lazyload"  data-src="{{ asset('storage/' . $intro->big_image) }}" alt="Small Image">
                            </picture>
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="block-country-intro__container">
                <h3 class="block-country-intro__subheading js-subheading">
                    {!! $intro->subtitle !!}
                </h3>
                <h2 class="block-country-intro__heading js-heading">
                    {!! $intro->title !!}
                </h2>
                <div class="block-country-intro__body js-body">
                    <div class="column">
                        {{-- {{ Str::length($intro->content) }} --}}
                        {{-- @if (Str::length($intro->content) > 900) {!! Str::limit($intro->content, 900, '...')  !!} @else {!! $intro->content !!} @endif --}}
                        {!! $intro->content !!}
                    </div>
                </div>
            </div>
        @endif
    </section>
@endif
