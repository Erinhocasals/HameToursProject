{{-- Section Texts --}}
@foreach ($texts as $text)
    <section class="block-copy bg-white mt-20" data-component="block-copy" style="width: 100%">
        @if ($text->image)
            <div class="block-about-us__item-column">
                <div alt="39×41" style="width: 44px; height: 44px" class="block-about-us__item-icon relative mb-3">
                    <img src="{{ asset('storage/' . $text->image->url) }}" alt="{!! $text->title !!}" >
                </div>
            </div>
        @endif
        <div class="block-copy__container">
            <h3 class="block-copy__heading">
                {!! $text->title !!}
            </h3>
            <div class="block-copy__body text-justify">
                {!! $text->content !!}
            </div>
        </div>
    </section>
@endforeach
