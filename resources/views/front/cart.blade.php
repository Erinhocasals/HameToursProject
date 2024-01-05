@extends('layouts.frontend.global')

@php
$logo = 'logo-black.png';
@endphp

@prepend('styles')
    <link rel="stylesheet" href="{{ asset('front-template/third-party/shopping-cart/dist/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-template/css/custom.css') }}">
@endprepend

@section('post_styles')
    <link rel="stylesheet" href="{{ asset('front-template/css/cart.css') }}">
@endsection

@prepend('scripts')
    <script src="{{ asset('front-template/js/custom.js') }}"></script>
    <script src="{{ asset('front-template/js/bootstrap-input-spinner.js') }}"></script>
    <script>
        $("input[type='number']").inputSpinner();

        $('form').on('submit', function() {
            $.blockUI({
                message: '<div class="lds-ring"><div></div><div></div><div></div><div></div></div> <h2>Procesando ...</h2>',
                css: {
                    backgroundColor: 'transparent',
                    color: 'white',
                    cursor: 'wait',
                    border: 'none'
                }
            });
        })

        $('.date-start').on('change', function() {
            let id = $(this).data('id');
            let fire = $('#fire-' + id);

            let endDateStr = $('.date-end[data-id=' + id + ']').val();

            if ($(this).val()) {
                let dateStart = stringToDate($(this).val(), 'dd/MM/yyyy', '/');
                let dateEnd = stringToDate(endDateStr, 'dd/MM/yyyy', '/');

                // To calculate the time difference of two dates
                var Difference_In_Time = dateEnd.getTime() - dateStart.getTime();

                // To calculate the no. of days between two dates
                var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

                console.log(Difference_In_Days + 1);

                fire.val(Difference_In_Days + 1);
                fire.click();
            }


        })

        $('.date-end').on('change', function() {
            let id = $(this).data('id');
            let fire = $('#fire-' + id);

            let startDateStr = $('.date-start[data-id=' + id + ']').val();

            if ($(this).val()) {
                let dateStart = stringToDate(startDateStr, 'dd/MM/yyyy', '/');
                let dateEnd = stringToDate($(this).val(), 'dd/MM/yyyy', '/');

                // To calculate the time difference of two dates
                var Difference_In_Time = dateEnd.getTime() - dateStart.getTime();

                // To calculate the no. of days between two dates
                var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

                console.log(Difference_In_Days + 1);

                fire.val(Difference_In_Days + 1);
                fire.click();
            }
        })

        function stringToDate(_date,_format,_delimiter)
        {
            var formatLowerCase=_format.toLowerCase();
            var formatItems=formatLowerCase.split(_delimiter);
            var dateItems=_date.split(_delimiter);
            var monthIndex=formatItems.indexOf("mm");
            var dayIndex=formatItems.indexOf("dd");
            var yearIndex=formatItems.indexOf("yyyy");
            var month=parseInt(dateItems[monthIndex]);
            month-=1;
            var formatedDate = new Date(dateItems[yearIndex],month,dateItems[dayIndex]);
            return formatedDate;
        }
    </script>
@endprepend

@section('content')
    <main id="content" class="content js-main" data-track-id="page">
        <article class="page-generic" data-view="pages/generic">

            <header class="block-hero" data-component="block-hero">
                <h2 class="block-hero__subheading js-subheading" style="opacity: 1; visibility: inherit;">
                    {!! $template->subtitle !!}
                </h2>
                <h1 class="block-hero__heading js-heading" style="opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
                    {!! $template->title !!}
                </h1>
            </header>

            <form method="POST" action="{{ route('front.checkout') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                <div class="card mt-20">
                    <div class="row">
                        {{ csrf_field() }}
                        <div class="col-md-8 cart">
                            <div class="title">
                                <div class="row">
                                    <div class="col">
                                        <h4><b>{!! $template->subtitle !!}</b></h4>
                                    </div>
                                    <div class="col align-self-center text-right text-muted totalElements"> {{ auth()->user()->openReservation()->totalElements() }} elementos</div>
                                </div>
                            </div>
                            @foreach (auth()->user()->openReservation()->elements as $element)
                                <div class="row border-top @if ($loop->last) border-bottom @endif">
                                    <div class="row main pb-1">
                                        @if ($element->elementable->reservation_message)
                                            {!! $element->elementable->reservation_message !!}
                                        @elseif ($element->parentable && $element->parentable->reservation_message)
                                            {!! $element->parentable->reservation_message !!}
                                        @endif
                                    </div>
                                    <div class="row main align-items-center pb-0">
                                        <div class="col-2">
                                            <a href="{{ $element->elementable->frontLink() }}@if ($element->parentable)?category={{ $element->parentable->friendly }}@endif">
                                                <img class="img-fluid" alt="{!! $element->elementable->title !!}" src="@if ($element->elementable->image) {{ asset('storage/' . $element->elementable->image->url) }} @else {{ asset('storage/' . $element->elementable->category->svg) }} @endif">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <div class="row text-muted">@if ($element->parentable) <a class="" href="{{ $element->parentable->frontLink() }}">{{ $element->parentable->title }}</a> @endif </div>
                                            <div class="row">{!! $element->elementable->title !!}</div>
                                        </div>

                                        {{-- <div class="col cart_elements">
                                            <div class="input-daterange input-group flight-datepicker mb-2" id="flight-datepicker">
                                                <div class="form-item">
                                                    <label>Fecha de Inicio</label><span class="fontawesome-calendar"></span>
                                                    <input class="input-sm form-control text-xs date-start" required type="text" id="start-date-{{ $element->id }}" name="reservation_start_{{ $element->id }}" placeholder="Inicio" data-date-format="DD, MM d"/>
                                                    <span class="date-text date-depart"></span>
                                                </div>
                                                <div class="form-item">
                                                    <label>Fecha de Fin</label><span class="fontawesome-calendar"></span>
                                                    <input class="input-sm form-control text-xs date-end" required type="text" id="end-date-{{ $element->id }}" name="reservation_end_{{ $element->id }}" placeholder="Fin" data-date-format="DD, MM d"/>
                                                    <span class="date-text date-return"></span>
                                                </div>
                                            </div>
                                            <input type="number" class="element" readonly="readonly" data-type="{{ strtolower(str_replace('App\\Models\\', '', $element->elementable_type)) }}" data-id="{{ $element->elementable->id }}" value="{{ $element->quantity }}" />
                                        </div> --}}

                                        <div class="col cart_elements">
                                            <div class="input-daterange input-group flight-datepicker mb-2" id="flight-datepicker">
                                                <div class="form-item">
                                                    <label>Fecha de Inicio</label><span class="fontawesome-calendar"></span>
                                                    <input class="input-sm form-control text-xs date-start" required type="text" id="start-date" data-id="{{ $element->elementable->id }}" data-field="reservation_start_{{ $element->elementable->id }}" name="reservation_start_{{ $element->id }}" placeholder="Inicio" data-date-format="DD, MM d"/>
                                                    <span class="date-text date-depart"></span>
                                                </div>
                                                <div class="form-item">
                                                    <label>Fecha de Fin</label><span class="fontawesome-calendar"></span>
                                                    <input class="input-sm form-control text-xs date-end" required type="text" id="end-date" data-id="{{ $element->elementable->id }}" data-field="reservation_end_{{ $element->elementable->id }}" name="reservation_end_{{ $element->id }}" placeholder="Fin" data-date-format="DD, MM d"/>
                                                    <span class="date-text date-return"></span>
                                                </div>
                                            </div>
                                            <input type="number" class="element" id="quantity-{{ $element->elementable->id }}" readonly="readonly" data-type="{{ strtolower(str_replace('App\\Models\\', '', $element->elementable_type)) }}" data-id="{{ $element->elementable->id }}" data-price="{{ $element->price }}" value="{{ $element->quantity }}" />
                                            <input type="hidden" class="fire" id="fire-{{ $element->elementable->id }}" data-type="{{ strtolower(str_replace('App\\Models\\', '', $element->elementable_type)) }}" data-id="{{ $element->elementable->id }}" value="1" />
                                        </div>

                                        <div class="col text-center"><span id="cart-price-element-{{ $element->elementable->id }}">${{ $element->price }} x {{ $element->quantity }} =  ${{ $element->price * $element->quantity }}</span> <span class="close element-remove" data-type="{{ strtolower(str_replace('App\\Models\\', '', $element->elementable_type)) }}" data-id="{{ $element->elementable->id }}">&#10005;</span></div>
                                    </div>
                                    <div class="row main pt-2">
                                        <textarea name="element_content_{{ $element->id }}" class="mb-2 w-full js-input" placeholder="Especifique alguna información adicional">{!! $element->content !!}</textarea>
                                    </div>
                                </div>
                            @endforeach
                            <div class="back-to-shop"><a href="{{ route('home') }}">&leftarrow;</a><span class="text-muted">{{ __('Continue Shopping') }}</span></div>
                        </div>
                        <div class="col-md-4 summary">
                            <div>
                                <h5><b>Resumen</b></h5>
                            </div>
                            <hr class="mb-20">
                            {{-- <div class="input-daterange input-group flight-datepicker mb-10 mt-5" id="flight-datepicker">
                                <div class="form-item">
                                    <label>Fecha de Inicio</label><span class="fontawesome-calendar"></span>
                                    <input class="input-sm form-control" type="text" id="start-date" name="reservation_start" placeholder="Inicio" data-date-format="DD, MM d"/><span class="date-text date-depart"></span>
                                </div>
                                <div class="form-item">
                                    <label>Fecha de Fin</label><span class="fontawesome-calendar"></span>
                                    <input class="input-sm form-control" type="text" id="end-date" name="reservation_end" placeholder="Fin" data-date-format="DD, MM d"/><span class="date-text date-return"></span>
                                </div>
                            </div> --}}
                            {{-- <p>SHIPPING</p> <select>
                                <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                            </select> --}}
                            <p>DESCRIPCION</p> <textarea name="reservation_content" class="mb-2 js-input" placeholder="Especifique alguna información adicional"></textarea>
                            {{-- <p>BONUS</p> <input name="reservation_bonus" class="mb-0 js-input bg-transparent" id="code1" placeholder="Entre el código"> --}}
                            {{-- <hr> --}}
                            {{-- <div class="row">
                                <div class="col totalElements" style="padding-left:0;"> {{ auth()->user()->openReservation()->totalElements() }} elementos </div>
                                <div class="col text-right">$ 132.00</div>
                            </div> --}}
                            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                <div class="col">TOTAL</div>
                                <div class="col text-right font-bold" id="cart-total-price">{{ auth()->user()->openReservation()->totalPrice() }}</div>
                                <div class="col text-right totalElements ">{{ auth()->user()->openReservation()->totalElements() }} elementos</div>
                            </div>
                            <button type="submit" class="w-full menu-desktop__button-enquiry text-white bg-black button-outline button-outline--inverted js-button-enquiry ml-0">{{ __('Book Now') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </article>
    </main>
@endsection
