@foreach ($menu->links as $link)
    @if ($link->menuable && $link->menuable->enabled)
        <li class="@if ($menu_item_type == 'desktop') menu-desktop-overlay__list-item @else menu-mobile-thumbnails__list-item-group @endif">
            <a class="@if ($menu_item_type == 'desktop') menu-desktop-overlay__link js-link @else menu-mobile-thumbnails__thumbnail @endif"
            href="{{ $link->url }}"
            data-id="data-{{ $link->id }}">
                @if ($menu_item_type == 'desktop')
                    <img class="menu-desktop-overlay__image js-image"
                        data-src="@if (isset($link->menuable->image->url)) {{ asset('storage/' . $link->menuable->image->url) }} @endif"
                        width="648" height="940" alt="@if (isset($link->menuable)) {{ $link->menuable->title }} @endif">
                    @if (isset($link->menuable->image->tag))
                        <span class="menu-desktop-overlay__label-icon js-label label-icon">
                            <svg class="label-icon__icon" width="10" height="16" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg"><path
                                    d="M0 5.942C0 3.052 2.243.7 5 .7s5 2.352 5 5.242c0 3.497-3.978 8.52-5.004 9.758C3.963 14.496 0 9.633 0 5.942zm2.606-.488c0-1.389 1.082-2.518 2.41-2.518 1.329 0 2.41 1.13 2.41 2.518 0 1.389-1.081 2.519-2.41 2.519-1.328 0-2.41-1.13-2.41-2.519z"
                                    fill="currentColor" fill-rule="evenodd" /></svg>
                            <span class="label-icon__label">
                                {{ $link->menuable->image->tag }}
                            </span>
                        </span>
                    @endif
                @else
                    <div class="responsive-image responsive-image--object-fit menu-mobile-thumbnails__image-thumbnail">
                        <picture class="responsive-image__picture ">
                            <img class="responsive-image__img lazyload"
                                data-src="@if (isset($link->menuable->image->url)) {{ asset('storage/' . $link->menuable->image->url) }} @endif"
                                alt="@if (isset($link->menuable)) {{ $link->menuable->title }} @endif">
                        </picture>
                    </div>
                @endif
                <span class="@if ($menu_item_type == 'desktop') menu-desktop-overlay__label-thumbnail @else menu-mobile-thumbnails__label-thumbnail @endif">
                    @if (isset($link->menuable)) {{ $link->menuable->title }} @endif
                </span>
            </a>
        </li>
    @endif
@endforeach
