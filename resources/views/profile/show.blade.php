@extends((auth()->user()->hasAnyRole('admin|super-admin|agency')) ? 'layouts.admin.global' : 'layouts.frontend.global');

@php
    $logo = "logo-black.png";
@endphp

@section('post_styles')
    <link rel="stylesheet" href="{{ asset('front-template/css/custom.css') }}">
    <link href="{{ asset('admin-template/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-template/vendor/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-template/vendor/select2/css/select2.optgroupSelect.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="{{ asset('front-template/third-party/pure-css-pie-timer/dist/style.css') }}">
    <style>
        body {
            background-color: #f6f6f6;
        }
        footer {
            background: linear-gradient(to bottom, rgb(246 246 246) 0%, #f1efec 100%);
        }
        .scroll-container-pages {
            margin-top: 10em;
            position: relative !important;
            transform: initial !important
        }
        .overlay-box:after, #remittances .btn-primary {
            background-color: #00c8d9;
        }
        .overlay-box.taken:after {
            background-color: #f72b50;
        }
        .overlay-box.completed:after {
            background-color: #c8c8c8 !important;
        }
        .select2-container--default .select2-selection--single {
            border-radius: 1.75rem;
            border: 1px solid #c8c8c8;
            /* height: 40px; */
            background: #fff;
        }
        @if (!auth()->user()->hasAnyRole('admin|super-admin|agency'))
            .modal-backdrop {
                z-index: -1 !important;
            }
        @endif
    </style>

    @stack('post_styles')
@endsection

@prepend('scripts')

    <script src="{{ asset('admin-template/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin-template/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-template/js/plugins-init/datatables.init.js') }}"></script>
    <script src="{{ asset('admin-template/vendor/select2/js/select2.js') }}"></script>
    <script src="{{ asset('admin-template/vendor/select2/js/select2.optgroupSelect.js') }}"></script>

    <script>
        $(window).on( "load", function() {
            var hash = window.location.hash;
            $('.nav-tabs a[href="' + hash + '"]').tab('show');
        });
    </script>

    @stack('scripts')

@endprepend

@section('content')

    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Profile') }}</a></li>
        </ol>
    </div>

    <div class="w-3/4 mx-auto sm:py-10 sm:px-6 lg:px-8">

        @include('badge-errors')

        <div class="profile-tab">
            <div class="custom-tab-1">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a href="#profile" data-bs-toggle="tab" class="nav-link show active">{{ __('Profile') }}</a>
                    </li>
                    <li class="nav-item"><a href="#reservations" data-bs-toggle="tab" class="nav-link">{{ __('Reservations') }}</a>
                    </li>
                    {{-- @livewire('profile-remittances-tab') --}}
                    @hasanyrole('bank|messenger')
                        @if (auth()->user()->kyc && auth()->user()->kyc->approved)
                            <li class="nav-item">
                                <a href="#remittances" data-bs-toggle="tab" class="nav-link relative">Remesas
                                    {{-- <span class="badge text-yellow-600 light badge-light absolute top-0 ml-1 text-xs">{{ $count }}</span> --}}
                                </a>
                            </li>
                        @endif
                    @endhasanyrole

                    <li class="nav-item"><a href="#beneficiaries" data-bs-toggle="tab" class="nav-link">Beneficiarios</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="profile" class="tab-pane fade active show">
                        <div class="mt-10">
                            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                @livewire('profile.update-profile-information-form')
                                <x-jet-section-border />
                            @endif

                            <div class="mt-10 sm:mt-0">
                                @livewire('k-y-c')
                            </div>

                            <div class="mt-10 sm:mt-0">
                                @livewire('profile-update-roles')
                            </div>

                            <div class="mt-10 sm:mt-0">
                                @livewire('profile-bank-role-options')
                            </div>

                            <x-jet-section-border />

                            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                <div class="mt-10 sm:mt-0">
                                    @livewire('profile.update-password-form')
                                </div>

                                <x-jet-section-border />
                            @endif

                            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                <div class="mt-10 sm:mt-0">
                                    @livewire('profile.two-factor-authentication-form')
                                </div>

                                <x-jet-section-border />
                            @endif

                            <div class="mt-10 sm:mt-0">
                                @livewire('profile.logout-other-browser-sessions-form')
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                <x-jet-section-border />

                                <div class="mt-10 sm:mt-0">
                                    @livewire('profile.delete-user-form')
                                </div>
                            @endif
                        </div>
                    </div>

                    <div id="reservations" class="tab-pane fade">
                        <div class="mt-10 card">
                            <div class="table-responsive card-body">
                                <table id="example3" class="display">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Creada</th>
                                            <th class="text-center">Productos</th>
                                            <th class="text-center">Precio</th>
                                            <th>Estado</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Auth::user()->reservations as $reservation)
                                        <tr>
                                            <td>{{ $reservation->id }}</td>
                                            <td>{{ date('j M, Y', strtotime($reservation->created_at)) }}</td>
                                            <td class="text-xs text-center italic">{{ count($reservation->elements) }}</td>
                                            <td class="text-xs text-center italic">${{ $reservation->totalPrice() }}</td>
                                            <td class="text-xs italic"><span class="badge badge-sm light badge-primary text-white" style="background: {{ $reservation->status->color }}">{{ $reservation->status->title }}</span></td>
                                            <td class="text-center">
                                                <a href="#" title="Detalles"><button class="shadow btn btn-info btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#modal-reservation-{{ $reservation->id }}"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modal-reservation-{{ $reservation->id }}">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            {{-- <div class="modal-header">
                                                                <h5 class="modal-title">Detalles de la Reservación</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <tr><th> Nombre </th><td> {{ $beneficiary->name }} </td></tr>
                                                                            <tr><th> Identificación </th><td> {{ $beneficiary->identification }} </td></tr>
                                                                            <tr><th> Dirección </th><td> {{ $beneficiary->address }} </td></tr>
                                                                            <tr><th> Teléfono </th><td> {{ $beneficiary->phone }} </td></tr>
                                                                            <tr><th> Correo </th><td> {{ $beneficiary->email }} </td></tr>
                                                                            <tr><th> Localización </th><td> <span class="badge badge-sm light badge-primary">{{ $beneficiary->location->municipio }}</span> </td></tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div> --}}
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Detalles de la reservación #{{ $reservation->id }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Producto</th>
                                                                                {{-- <th class="center">Cantidad</th> --}}
                                                                                <th class="text-center">Precio</th>
                                                                                <th class="right">Fecha</th>
                                                                                <th class="right">Descripción</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($reservation->elements as $element)
                                                                                <tr>
                                                                                    <td class="left strong"><a href="{{ $element->elementable->backendLink() }}">{{ $element->elementable->title }}</a></td>
                                                                                    {{-- <td class="text-center">{{ $element->quantity }}</td> --}}
                                                                                    <td class="text-center">${{ $element->price * $element->quantity }}</td>
                                                                                    <td class="right">@if ($element->date_start) {{ date('j M, Y', strtotime($element->date_start)) }} @endif - @if ($element->date_end) {{ date('j M, Y', strtotime($element->date_end)) }} @endif </td>
                                                                                    <td class="text-center">
                                                                                        @if ($element->content)
                                                                                            <a class="badge badge-dark" href="#" data-bs-toggle="modal" data-bs-target="#content-details-{{ $element->id }}">Detalles</a>
                                                                                            <div class="modal fade" id="content-details-{{ $element->id }}">
                                                                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                                                    <form method="POST" action="{{ route('front.remittance.confirm', ['id' => $element->id]) }}">
                                                                                                        @csrf

                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title">Detalles Avanzados</h5>
                                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                                                            </div>
                                                                                                            <div class="modal-body">
                                                                                                                <div class="table-responsive">
                                                                                                                    <table class="table">
                                                                                                                        <tbody>
                                                                                                                            <tr><th> Descripción </th><td> {{ $element->content }} </td></tr>
                                                                                                                            @if ($element->elementable->bank_interaction && $element->messenger_response_at)
                                                                                                                                <tr><th> Entrega </th><td> {{ $element->elementable->bank_delivery_amount * $element->quantity }} {{ $element->elementable->currencyToString() }} </td></tr>
                                                                                                                                <tr><th> Completado </th><td> {{ date('j M, h:i:s', strtotime($element->messenger_response_at)) }} </td></tr>
                                                                                                                                <tr><th> Verificación </th><td> <a href="{{ asset('storage/' . $element->messenger_response_image ) }}"><img class="shadow-sm" width="150" src="{{ asset('storage/' . $element->messenger_response_image ) }}"></a> <br/> {{ $element->messenger_response }} </td></tr>
                                                                                                                            @endif

                                                                                                                            {{-- <tr><th> Dirección </th><td> {{ $beneficiary->address }} </td></tr>
                                                                                                                            <tr><th> Teléfono </th><td> {{ $beneficiary->phone }} </td></tr>
                                                                                                                            <tr><th> Correo </th><td> {{ $beneficiary->email }} </td></tr>
                                                                                                                            <tr><th> Localización </th><td> <span class="badge badge-sm light badge-primary">{{ $beneficiary->location->municipio }}</span> </td></tr> --}}
                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                @if ($element->canClientConfirm())
                                                                                                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                                                                                                @endif
                                                                                                                @if ($element->isConfirmed())
                                                                                                                    <button type="button" disabled class="btn btn-success">Confirmada</button>
                                                                                                                @endif
                                                                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @hasanyrole('bank|messenger')
                        @if (auth()->user()->kyc && auth()->user()->kyc->approved)
                            <div id="remittances" class="tab-pane fade">
                                @livewire('profile-remittances')
                            </div>
                        @endif
                    @endhasanyrole

                    <div id="beneficiaries" class="tab-pane fade">
                        <div class="mt-10">
                            <div class="mt-10 sm:mt-0">
                                @livewire('beneficiary-form')
                            </div>

                            <div class="mt-10 sm:mt-0">
                                @livewire('beneficiary-list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
