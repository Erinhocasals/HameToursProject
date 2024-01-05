@extends('layouts.admin.global')

@prepend('scripts')
    <script src="{{ asset('admin-template/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-template/vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('admin-template/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('admin-template/vendor/morris/morris.min.js') }}"></script>
    {{-- <script src="{{ asset('admin-template/js/plugins-init/morris-init.js') }}"></script> --}}

    <script>
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'morris_line',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                @foreach ($chart as $c)
                    { day: "{{ $c['day'] }}", reservations: {{ $c['reservations'] }}, open: {{ $c['open'] }}, pending: {{ $c['pending'] }} } @if (!$loop->last),@endif
                @endforeach
            ],
            hideHover: 'auto',
            gridLineColor: 'transparent',
            ymin: 0,
            gridIntegers: true,
            // The name of the data record attribute that contains x-values.
            xkey: 'day',
            parseTime: false,
            // A list of names of data record attributes that contain y-values.
            ykeys: ['reservations','open', 'pending'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Reservaciones', 'Abiertas', 'Enviadas'],
            lineColors: ['#f72b50','#6e6e6e','#68e365']
        });

        new Morris.Bar({
            // ID of the element in which to draw the chart.
            element: 'morris_bar',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                @foreach ($stacked as $s)
                    { month: "{{ $s['month'] }}", reservations: {{ $s['reservations'] }}, open: {{ $s['open'] }}, pending: {{ $s['pending'] }} } @if (!$loop->last),@endif
                @endforeach
            ],
            hideHover: 'auto',
            gridLineColor: 'transparent',
            stacked: false,
            ymin: 0,
            gridIntegers: true,
            barSizeRatio: 0.25,
            // The name of the data record attribute that contains x-values.
            xkey: 'month',
            parseTime: false,
            // A list of names of data record attributes that contain y-values.
            ykeys: ['reservations','open', 'pending'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Reservaciones', 'Abiertas', 'Enviadas'],
            lineColors: ['#f72b50','#6e6e6e','#68e365']
        });
    </script>
@endprepend

@section('content')
<div class="flex-wrap mb-sm-4 d-flex align-items-center text-head">
    <h2 class="mb-2 font-w600 me-auto">Dashboard</h2>
</div>

@include('badge-errors')

<div class="row">
    @if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin'))
        <div class="col-xl-4 col-lg-12 col-xxl-4 col-sm-12">
            <div class="alert alert-dark notification">
                <p class="notificaiton-title mb-2"><strong>Bienvenido! </strong> {{ Auth::user()->name }}
                </p>
                <p>{!! Auth::user()->roles->where('name', '=', 'agency')->first()->content !!} </p>
                <a href="{{ route('admin.categories.create', ['type' => 3]) }}" class="btn btn-dark btn-sm">Crear Agencia</a>
            </div>
        </div>
    @endif
    @foreach ($agencies as $definition)
        <div class="col-xl-4 col-lg-12 col-xxl-4 col-sm-12">
            <div class="card">
                <div class="card-body text-center ai-icon text-primary flex flex-column items-center justify-center">
                    <svg id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                    <h4 class="my-2">{{ $definition->editable->title }}</h4>
                    <a href="{{ route('admin.categories.show', ['category' => $definition->editable->id]) }}" class="btn my-2 btn-primary btn-sm px-4"><i class="fa fa-cogs"></i> {{ __('Manage Account') }}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="row">
    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
        <div class="widget-stat card bg-danger">
            <div class="card-body  p-4">
                <div class="media">
                    <span class="me-3">
                        <a href="{{ route('admin.reservations.index') }}"><i class="fa fa-receipt text-white"></i></a>
                    </span>
                    <div class="media-body text-white text-end">
                        <p class="mb-1">Reservaciones</p>
                        <h3 class="text-white">{{ $reservations['total'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
        <div class="widget-stat card bg-dark">
            <div class="card-body  p-4">
                <div class="media">
                    <span class="me-3">
                        <a href="{{ route('admin.reservations.index', ['status' => 0]) }}"><i class="fa fa-receipt text-white"></i></a>
                    </span>
                    <div class="media-body text-white text-end">
                        <p class="mb-1">Reservaciones Abiertas</p>
                        <h3 class="text-white">{{ $reservations['open'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
        <div class="widget-stat card bg-success">
            <div class="card-body  p-4">
                <div class="media">
                    <span class="me-3">
                        <a href="{{ route('admin.reservations.index', ['status' => 1]) }}"><i class="fa fa-receipt text-white"></i></a>
                    </span>
                    <div class="media-body text-white text-end">
                        <p class="mb-1">Reservaciones Enviadas</p>
                        <h3 class="text-white">{{ $reservations['pending'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @hasanyrole('super-admin|admin|editor')
        <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                <div class="widget-stat card bg-info">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="me-3">
                                <i class="fa fa-address-card"></i>
                            </span>
                            <div class="media-body text-white text-end">
                                <p class="mb-1">KYC</p>
                                <h3 class="text-white">{{ count($kyc) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-primary">
                <div class="card-body p-4">
                    <div class="media">
                        <span class="me-3">
                            <i class="flaticon-381-user-7"></i>
                        </span>
                        <div class="media-body text-white text-end">
                            <p class="mb-1">Usuarios</p>
                            <h3 class="text-white">{{ count($users) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-secondary">
                <div class="card-body p-4">
                    <div class="media">
                        <span class="me-3">
                            <i class="fa fa-receipt"></i>
                        </span>
                        <div class="media-body text-white">
                            @php
                                $total = count($remittances);
                                $done = $remittances->whereNotNull('messenger_response_at')->count();
                                $percent = ($total == 0) ? 0 : ($done * 100) / $total;
                            @endphp
                            <p class="mb-1">Mensajerías</p>
                            <h3 class="text-white">{{ $total }}</h3>
                            <div class="progress mb-2 bg-primary">
                                <div class="progress-bar progress-animated bg-light" style="width: {{ $percent }}%"></div>
                            </div>
                            <small>{{ $percent }}% completado</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endhasanyrole
</div>
<div class="row">
    <div class="col-xl-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Reservaciones Esta Semana</h4>
            </div>
            <div class="card-body p-0">
                <div id="morris_line" class="morris_chart_height"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Reservaciones Este Año</h4>
            </div>
            <div class="card-body">
                <div id="morris_bar" class="morris_chart_height"></div>
            </div>
        </div>
    </div>
</div>

@hasanyrole('super-admin|admin|editor')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0 pb-0">
                <h4 class="mb-0 fs-20 text-black">Disponibilidad de Fondos</h4>
            </div>
            <div class="card-body">
                @foreach ($transactions as $tx)
                    <div class="bg-gradient-1 coin-holding mt-4 flex-wrap">
                        <div class="mb-2 coin-bx">
                            <div class="d-flex align-items-center">
                                <div>
                                    @if ($tx['key'] == 'EUR')
                                        <img src="https://img.icons8.com/ios-filled/50/000000/euro-pound-exchange.png"/>
                                    @elseif ($tx['key'] == 'CUP')
                                        <img src="https://img.icons8.com/ios-filled/50/000000/delete-dollar.png"/>
                                    @elseif ($tx['key'] == 'USD')
                                        <img src="https://img.icons8.com/ios-filled/50/000000/us-dollar-circled--v2.png"/>
                                    @elseif ($tx['key'] == 'CRIPTO')
                                        <img src="https://img.icons8.com/ios-filled/50/000000/mts-money.png"/>
                                    @endif
                                </div>
                                <div class="ms-3">
                                    <h4 class="coin-font font-w600 mb-0">{{ $tx['key'] }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <h2 class="mb-0 text-primary coin-font-1">{{ $tx['value'] }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endhasanyrole

@endsection
