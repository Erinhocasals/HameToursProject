@if (isset($price))
    <div class="highlighted-example-trip__price">
        <span class="highlighted-example-trip__price-label">{!! $price->top_line !!}</span>
        <span class="highlighted-example-trip__price-value pricing" data-component="pricing" data-type="static">
            <span class="pricing__symbol js-symbol">
                $
            </span>
            <span class="pricing__price js-price" data-default="{{ $price->price }}">
                {{ $price->price }}
            </span>
            <br>
            <span class="pricing__suffix">
                {!! $price->bottom_line !!}
            </span>
        </span>
    </div>
@endif
