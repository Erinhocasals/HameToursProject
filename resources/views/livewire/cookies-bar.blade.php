<div class="cookie-message js-cookie-message" data-component="cookie-message" aria-hidden="true">
    <div class="cookie-message__body">
        {!! $cookie->content !!}
    </div>
    <button class="button-outline cookie-message__button js-button">
        <span class="button-outline__label js-label">
            {{ __('I agree') }}
        </span>
    </button>
</div>
