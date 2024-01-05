@extends('layouts.admin.global')

@prepend('styles')
<link href="{{ asset('admin-template/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin-template/vendor/summernote/summernote-lite.min.css') }}" rel="stylesheet">
@endprepend

@prepend('scripts')
<script src="{{ asset('admin-template/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('admin-template/vendor/summernote/summernote-lite.min.js') }}"></script>
<script>
    (document.querySelectorAll(".sweet-success-cancel").forEach(item => {
        item.addEventListener('click', event => {
            swal.fire({
                title: "¿Está seguro que desea eliminar el elemento?",
                text: "No podrá recuperar este elemento una vez lo haya borrado !!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#f72b50",
                confirmButtonText: "Sí, elimínalo !!",
                cancelButtonText: "Cancelar !!",
                closeOnConfirm: !1,
                closeOnCancel: !1,
            }).then((result) => {
                if (result.value) {
                    item.closest('form').submit();
                }
            });
        })
    }) )
</script>
@endprepend

@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Reservaciones</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">#{{ $reservation->id }}</a></li>
        </ol>
    </div>

    @include('badge-errors')

    <div class="row">
        <div class="col-lg-12">

            <div class="card mt-3">
                <div class="card-header">
                    <strong><span class="badge badge-sm light badge-primary text-white" style="background: {{ $reservation->status->color }}">{{ $reservation->status->title }}</span></strong>
                    <strong>{{ $reservation->created_at }}</strong>
                    <span class="float-end">
                        <div class="flex justify-end">
                            <a href="{{ url('/admin/reservations') }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>

                            <a href="#" title="Responder"><button type="button" class="mr-1 shadow btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Procesar</button></a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ url('/admin/reservations/' . $reservation->id . '/response') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="modal-header">
                                                <h5 class="modal-title">Procesar Reservación</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <label for="status" class="form-label">Cambiar Estado</label>
                                                    <div class="row align-items-center">
                                                        <div class="w-full my-1">
                                                            <select name="select-status" class="me-sm-2 default-select form-control wide" required id="select-status" >
                                                                <option value="">Seleccione ...</option>
                                                                @foreach ($statuses as $status)
                                                                    <option value="{{ $status->id }}" {{ ($reservation->status_id == $status->id) ? 'selected' : ''}}>{{ $status->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="message" class="form-label">Descripción Adicional</label>
                                                    <textarea class="form-control summernote" rows="5" name="message" type="textarea" id="message" ></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- <form method="POST" action="{{ url('admin/reservation' . '/' . $reservation->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="button" class="shadow btn btn-danger btn-sm sweet-success-cancel" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                            </form> --}}
                        </div>
                    </span>
                </div>
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <h6>Reservación:</h6>
                            <div><strong>ID:</strong> {{ $reservation->id }} </div>
                            {{-- <div><strong>Fecha Inicio:</strong> @if ($reservation->date_start) {{ date('j F, Y', strtotime($reservation->date_start)) }} @endif</div>
                            <div><strong>Fecha Fin:</strong> @if ($reservation->date_end) {{ date('j F, Y', strtotime($reservation->date_start)) }} @endif </div> --}}
                            {{-- <div><strong>BONUS CODE:</strong> </div> --}}
                            <div><strong>Descripción General:</strong> {!! $reservation->content !!}</div>
                        </div>
                        <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <h6>Usuario:</h6>
                            <div> <strong><a href="{{ route('admin.users.show', ['user' => $reservation->user]) }}">{{ $reservation->user->name }}</a></strong> </div>
                            <div><strong>Correo:</strong> <a href="mailto:{{ $reservation->user->email }}"> {{ $reservation->user->email }} </a></div>
                            <div><strong>Teléfono:</strong> {{ $reservation->user->phone }}</div>
                        </div>
                        @if (count($reservation->containsReferral()) > 0)
                            <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 ">
                                <h6>Margen Comercial:</h6>
                                <span>Esta reservación contiene <strong><span class="badge light badge-danger">{{ count($reservation->containsReferral()) }}</span></strong> productos con margen comercial</span><br>
                                <span>Revise los detalles para obtener más detales sobre los márgenes comerciales</span><br>
                                <strong>El precio neto de la reservación es ${{ $reservation->totalRealPrice() }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Elemento</th>
                                    <th>Pertenece</th>
                                    <th class="center">Cantidad</th>
                                    <th class="center">Precio</th>
                                    <th class="right">Fecha</th>
                                    <th class="right">Descripción</th>
                                    <th class="right">Propiedades</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($elements as $element)
                                    <tr>
                                        <td class="center">{{ $element->id }}</td>
                                        <td class="left strong"><a href="{{ $element->elementable->backendLink() }}">{{ $element->elementable->title }}</a></td>
                                        <td class="left strong">@if ($element->parentable) <a href="{{ $element->parentable->backendLink() }}">{{ $element->parentable->title }}</a> @else - @endif</td>
                                        <td class="left"><span class="badge light badge-light">{{ $element->quantity }}</span></td>
                                        <td class="left"><a href="#" class="@if ($element->referral) text-red-500 font-bold @endif" data-bs-toggle="modal" data-bs-target="#modal-price-{{ $element->id }}">${{ $element->price ?: 0 }}</a></td>
                                        <td class="right">@if ($element->date_start) {{ date('j M, Y', strtotime($element->date_start)) }} @endif - @if ($element->date_end) {{ date('j M, Y', strtotime($element->date_end)) }} @endif </td>
                                        <td class="center">{{ $element->content }} @if ($element->beneficiary) <br/><a href="{{ route('admin.beneficiary.show', ['beneficiary' => $element->beneficiary->id]) }}"><span class="badge light badge-primary">Beneficiario: {{ $element->beneficiary->name }}</span></a> @endif </td>
                                        <td class="center">
                                            @if ($element->referral)
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-price-{{ $element->id }}"><span class="badge light badge-light">Margen Comercial: ${{ $element->price - $element->priceRelation->price }} ({{ $element->referralData()->tax }}%)</span></a>
                                                <a href="{{ route('admin.users.show', ['user' => $element->referralOwner()->id]) }}" ><span class="badge light badge-primary">{{ $element->referralOwner()->name }}</span></a>
                                            @endif
                                            @if ($element->bank_id) <a href="#" data-bs-toggle="modal" data-bs-target="#modal-remittance-{{ $element->id }}"><span class="badge light badge-light">Mensajería</span></a> @endif
                                        </td>

                                        @if ($element->priceRelation)
                                            <div class="modal fade show" id="modal-price-{{ $element->id }}" aria-modal="true" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detalle del Precio</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="mb-4">
                                                                        <p class="mb-2">Línea superior</p>
                                                                        <h4 class="text-black">{{ $element->priceRelation->top_line }}</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="mb-4">
                                                                        <p class="mb-2">Línea inferior</p>
                                                                        <h4 class="text-black">{!! $element->priceRelation->bottom_line !!}</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="mb-4">
                                                                        <p class="mb-2">Precio</p>
                                                                        <h4 class="text-black">{{ $element->priceRelation->price }}</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="mb-4">
                                                                        <p class="mb-2">Pertenece</p>
                                                                        <h4 class="text-black"><a href="{{ $element->priceRelation->priceable->backendLink() }}" <span class="badge badge-sm light badge-primary">{{ $element->priceRelation->priceable->title }}</span> </a></h4>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="mb-4">
                                                                        <p class="mb-2">País/Región</p>
                                                                        <h4 class="text-black">
                                                                            @if ($element->priceRelation->country_code)
                                                                                <span class="badge badge-sm light badge-primary">{{ $element->priceRelation->countryOrContinent()->emoji }} {{ $element->priceRelation->countryOrContinent()->name }}</span>
                                                                            @else
                                                                                <span class="badge badge-sm light badge-light">por defecto</span>
                                                                            @endif
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="mb-4">
                                                                        <p class="mb-2">Fecha Inicio</p>
                                                                        <h4 class="text-black">{{ date('j M, Y', strtotime($element->priceRelation->date_start)) }}</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="mb-4">
                                                                        <p class="mb-2">Fecha Fin</p>
                                                                        <h4 class="text-black">{{ date('j M, Y', strtotime($element->priceRelation->date_end)) }}</h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-dark light" data-bs-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($element->bank_id)
                                            <div class="modal fade show" id="modal-remittance-{{ $element->id }}" aria-modal="true" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detalles de la Mensajería</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item d-flex justify-content-between">
                                                                    <span class="mb-0">Entrega </span>
                                                                    <strong class="text-muted"> {{ $element->elementable->bank_delivery_amount * $element->quantity }} {{ $element->elementable->currencyToString() }} </strong>
                                                                </li>
                                                                @if ($element->taken_at)
                                                                    <li class="list-group-item d-flex justify-content-between">
                                                                        <span class="mb-0">Reservado </span>
                                                                        <strong class="text-muted text-right"> <a href="{{ route('admin.users.show', ['user' => $element->banker->id]) }}"> {{ $element->banker->name }} </a> <br/> {{ date('j M, h:i:s', strtotime($element->taken_at)) }} </strong>
                                                                    </li>
                                                                @endif

                                                                @if ($element->messenger_takent_at)
                                                                    <li class="list-group-item d-flex justify-content-between">
                                                                        <span class="mb-0">Mensajería</span>
                                                                        <strong class="text-muted"> <a href="{{ route('admin.users.show', ['user' => $element->messenger->id]) }}"> {{ $element->messenger->name }} </a> <br/> {{ date('j M, h:i:s', strtotime($element->messenger_taken_at)) }} </strong>
                                                                    </li>
                                                                @endif

                                                                @if ($element->banker_check_at)
                                                                    <li class="list-group-item d-flex justify-content-between">
                                                                        <span class="mb-0">Confirmado por Banquero </span>
                                                                        <strong class="text-muted text-right"> {{ date('j M, h:i:s', strtotime($element->banker_check_at)) }} </strong>
                                                                    </li>
                                                                @endif

                                                                @if ($element->messenger_check_at)
                                                                    <li class="list-group-item d-flex justify-content-between">
                                                                        <span class="mb-0">Confirmado por Mensajero </span>
                                                                        <strong class="text-muted text-right"> {{ date('j M, h:i:s', strtotime($element->messenger_check_at)) }} </strong>
                                                                    </li>
                                                                @endif

                                                                @if ($element->messenger_response_at)
                                                                    <li class="list-group-item d-flex justify-content-between">
                                                                        <span class="mb-0">Completado </span>
                                                                        <strong class="text-muted text-right"> <a href="{{ route('admin.users.show', ['user' => $element->messenger_id ? $element->messenger->id : $element->banker->id]) }}"> {{ $element->messenger_id ? $element->messenger->name : $element->banker->name }} </a> <br/> {{ date('j M, h:i:s', strtotime($element->messenger_response_at)) }} </strong>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between">
                                                                        <span class="mb-0">Prueba </span>
                                                                        <strong class="text-muted text-right"> <a href="{{ asset('storage/' . $element->messenger_response_image ) }}"><img class="shadow-sm img-fluid" width="100" src="{{ asset('storage/' . $element->messenger_response_image ) }}"></a> <br/> {{ $element->messenger_response }} </strong>
                                                                    </li>
                                                                @endif

                                                                @if ($element->isConfirmed())
                                                                    <li class="list-group-item d-flex justify-content-between">
                                                                        <span class="mb-0">Confirmación </span>
                                                                        <strong class="text-muted text-right"> @if ($element->client_confirmation_at) <span class="badge badge-success">{{ $element->client_confirmation_at }}</span> @else <span class="badge badge-success">Expiró el tiempo de confirmación</span> @endif </strong>
                                                                    </li>
                                                                @else
                                                                    <li class="list-group-item d-flex justify-content-between">
                                                                        <span class="mb-0">Confirmación </span>
                                                                        <strong class="text-muted text-right"> No confirmado todavía </strong>
                                                                    </li>
                                                                @endif

                                                                {{-- @if ($element->messenger_response_at == null)
                                                                    <li class="list-group-item d-flex items-right justify-content-between">
                                                                        <span class="mb-0">Tiempo Restante</span>
                                                                        <strong class="text-muted">
                                                                            @php
                                                                                $remaining = $element->remainingSeconds()
                                                                            @endphp
                                                                            {{ $element->remaining() }}
                                                                        </strong>
                                                                    </li>
                                                                @else
                                                                    <li class="list-group-item d-flex justify-content-between">
                                                                        <span class="mb-0">Completado</span>
                                                                        <strong class="text-muted"> {{ date('j M h:i:s', strtotime($element->messenger_response_at)) }} </strong>
                                                                    </li>

                                                                    <div class="text-left p-4">
                                                                        <strong> {!! $element->messenger_response !!} </strong> <br>
                                                                        <a href="{{ asset('storage/' . $element->messenger_response_image ) }}"><img class="mt-3 shadow-sm" src="{{ asset('storage/' . $element->messenger_response_image ) }}"></a>
                                                                    </div>
                                                                @endif --}}
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-dark light" data-bs-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5"> </div>
                        <div class="col-lg-4 col-sm-5 ms-auto">
                            <table class="table table-clear">
                                <tbody>
                                    {{-- <tr>
                                        <td class="left"><strong>Subtotal</strong></td>
                                        <td class="right">$8.497,00</td>
                                    </tr>
                                    <tr>
                                        <td class="left"><strong>Discount (20%)</strong></td>
                                        <td class="right">$1,699,40</td>
                                    </tr> --}}
                                    @if ($reservation->containsReferral())
                                    <tr>
                                        <td class="left"><strong>Precio Neto</strong></td>
                                        <td class="right">${{ $reservation->totalRealPrice() }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="left"><strong>Total</strong></td>
                                        <td class="right"><strong>${{ $reservation->totalPrice() }}</strong>
                                            {{-- <br>
                                            <strong>0.15050000 BTC</strong> --}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
