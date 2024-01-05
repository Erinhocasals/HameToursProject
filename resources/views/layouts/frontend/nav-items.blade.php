@foreach ($menus as $menu)
    <li class="menu-{{ $menu_item_type }}__list-item-buttons">
        <button @if ($menu_item_type == 'desktop' && $menu->style == 1) id="menu-destinations" @endif
            class="@if ($menu_item_type == 'desktop') menu-desktop__button-list menu-desktop__button-list--arrow js-button-menu @if (!$menu->grouped && count($menu->links) > 1) js-button-list @endif @else menu-mobile-overview__button-group js-button-group @endif"
            @if ($menu_item_type == 'desktop') data-list="@if ($menu->style == 1) destinations @else menu-{{ $menu->id }} @endif" @endif
            @if ($menu_item_type == 'mobile' && count($menu->links) > 1) data-group="menu-{{ $menu->id }}" @endif
            @if ($menu->grouped) onclick="window.location='{{ route('front.group', ['friendly' => $menu->friendly]) }}'" @elseif (count($menu->links) == 1) onclick="window.location='{{ $menu->links->first()->url }}'" @endif
        >

            {!! $menu->title !!}

            @if (count($menu->links) > 1 && !$menu->grouped)
                <svg class="@if ($menu_item_type == 'desktop') ml-1 menu-desktop__icon-button-list @else menu-mobile-overview__icon-button-group @endif"
                    width="7" height="10" viewBox="0 0 7 10" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.243.757L5.485 5 1.243 9.243" stroke="currentColor" stroke-width="1.5" fill="none"
                        fill-rule="evenodd" />
                </svg>
            @endif
        </button>
    </li>
@endforeach
