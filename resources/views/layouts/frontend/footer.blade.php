<style>
    .block-footer__link-social:hover {
        transform: scale(1.2)
    }
</style>
<footer class="block-footer pt-60">
    <div class="block-footer__container" style="z-index: 1">
        @foreach ($footer as $ft)
            <div class="block-footer__column mb-5">
                <div class="block-footer__group">
                    <div class="block-footer__heading">{!! $ft->title !!}</div>
                    <ul>
                        @foreach ($ft->links as $link)
                            <li class="block-footer__list-item">
                                <a class="block-footer__link" href="@if (isset($link->menuable)) {{ $link->menuable->frontLink() }} @endif" target="">
                                    @if (isset($link->menuable)) {!! $link->menuable->title !!} @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach

        <div class="block-footer__column mb-5">
            <div class="block-footer__group">
                <div class="block-footer__heading">{{ __('Contact Us') }}</div>
                <ul>
                    @if ($data && $data->hame_address)
                        <li>
                            <span class="flex">
                                {{ $data->hame_address }}
                            </span>
                        </li>
                    @endif
                    @if ($data && $data->hame_email)
                        <li>
                            <a class="block-footer__link" href="mailto:{{ $data->hame_email }}" target="">
                                {{ $data->hame_email }}
                            </a>
                        </li>
                    @endif
                    @if ($data && $data->hame_phone)
                        <li>
                            <a class="block-footer__link" href="tel:{{ $data->hame_phone }}" target="">
                                {{ $data->hame_phone }}
                            </a>
                        </li>
                    @endif
                    @if ($data && $data->hame_schedule)
                        <li>
                            <span class="flex justify-center">
                                {{ $data->hame_schedule }}
                            </span>
                        </li>
                    @endif
                </ul>
            </div>

            <ul class="block-footer__list-socials mt-3">
                @foreach ($socials as $social)
                    <li class="block-footer__list-item-socials">
                        <a class="block-footer__link-social" href="{{ $social->url }}"
                        aria-label="{{ $social->title }}" target="_blank" rel="noopener noreferrer">
                            <img class="h-8" src="{{ asset('storage/' . $social->image->url ) }}">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="block-footer__container-legal">
            <small class="block-footer__copyright flex justify-center">
                <img src="{{ asset('front-template/assets/img/logo-black.png') }}" alt="Black logo" style="height: 44px">
            </small>
            <div class="block-footer__copy flex justify-center">
                <ul class="block-footer__list-links-small">
                    @foreach ($footer_links as $link)
                        <li class="block-footer__list-item-links-small">
                            <a class="block-footer__link-small" href="{{ route('front.info', ['friendly' => $link->friendly]) }}" target="">
                                {!! $link->title !!}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <video class="video" id="footer-video" autoplay loop muted oncontextmenu="return false;" style="width: 100%; -webkit-mask-image: linear-gradient(to bottom, transparent 0%, black 75%);
        mask-image: linear-gradient(to bottom, transparent 0%, black 75%);">
            <source src="{{ asset('front-template/beach_shore.mp4') }}" type="video/mp4">
              {{-- Your browser does not support HTML5 video. --}}
              <img src="{{ asset('front-template/assets/img/beach-footer.png') }}" style="width: 100%">
        </video>

    {{-- <img src="{{ asset('front-template/assets/img/beach-footer.png') }}" style="width: 100%"> --}}
</footer>
