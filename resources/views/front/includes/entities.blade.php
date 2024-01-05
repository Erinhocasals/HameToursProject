<style>
    .button-outline:before {
        border: 1.5px solid #000;
    }
</style>
<ul class="block-lodge-activity-overview__list">
    @foreach ($ecat->enabledEntities($category) as $entity)
        {{-- @if ($entity->definitions->contains($category->id)) --}}
            <li class="block-lodge-activity-overview__list-item">
                {{-- @auth --}}
                @if (!$entity->bank_interaction)
                    <button
                    id="btn-add-to-cart-{{ $entity->id }}"
                    data-title="{!! $entity->title !!}"
                    data-type="entity"
                    data-id="{{ $entity->id }}"
                    data-parent-id="{{ $category->id }}"
                    data-parent-type="Category"
                    title="{{ __('Booking') }}"
                    style="margin-bottom: 3em !important"
                    class="hidden btn-add-to-cart  p-0 w-10 h-10 bg-black rounded-full hover:bg-yellow-600 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none absolute z-10 right-0 mr-2 mt-2 mb-2 text-black bottom-0">
                        <img class="hidden" src="@if ($entity->image) {{ asset('storage/' . $entity->image->url) }} @else {{ asset('storage/' . $entity->category->svg) }} @endif" />
                        <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-6 h-6 inline-block">
                        <path fill="#FFFFFF" d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601
                                                C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399
                                                C15.952,9,16,9.447,16,10z"></path>
                        </svg>
                    </button>
                @endif
                {{-- @endauth --}}

                <section class="activity-lodge mb-3">
                    @if ($entity->image)
                        <div class="responsive-image responsive-image--object-fit activity-lodge__image">
                            <a href="@if ($entity->friendly) {{ route('front.entity', ['category' => $category->friendly, 'friendly' => $entity->friendly]) }} @endif">
                                <picture class="responsive-image__picture ">
                                    <source media="(min-width: 768px)" data-srcset="{{ asset('storage/' . $entity->image->url) }}" type="image/webp">
                                    <img class="responsive-image__img lazyload" quickbeam="image-{{ $entity->id }}" data-src="{{ asset('storage/' . $entity->image->url) }}" alt="{{ $entity->title }}">
                                </picture>
                            </a>
                        </div>
                    @endif
                    <div class="activity-lodge__description">
                        <div class="highlighted-example-trip__action mb-2">
                            <a href="@if ($entity->friendly) {{ route('front.entity', ['category' => $category->friendly, 'friendly' => $entity->friendly]) }} @endif">
                                <h3 class="activity-lodge__heading mb-5">
                                    {!! $entity->title !!}
                                </h3>
                            </a>

                            {{-- @include('front.includes.price', ['price' => $entity->defaultPrice()]) --}}
                            <div class="highlighted-example-trip__price" id="price-component-{{ $entity->id }}"></div>
                        </div>

                        <div class="mr-5">
                            {!! $entity->summary !!}
                        </div>

                        @if ($entity->bank_interaction)
                            <div class="mt-4">
                                <button class="button-outline highlighted-example-trip__button" onclick="window.location='{{ auth()->user() ? route('front.entity', ['friendly' => $entity->friendly]) : route('login') }}'">
                                    <span class="button-outline__label js-label">
                                        Ver detalles
                                    </span>
                                </button>
                            </div>
                        @endif

                        {{-- @if (!$entity->friendly)
                            <hr>
                            {!! $entity->characteristics !!}
                        @endif --}}

                    </div>
                </section>
            </li>
        {{-- @endif --}}
    @endforeach
</ul>
