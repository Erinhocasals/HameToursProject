<div class="pt-5" @if ($polling) wire:poll.visible.5s @endif>
    <div class="row">
        {{-- {{ auth()->user()->kyc->locations }} --}}
        @foreach (auth()->user()->remittances() as $r)
            <div class="@if (auth()->user()->hasAnyRole('admin|super-admin|agency')) col-xl-4 @else col-xl-4 @endif  col-lg-12 col-sm-12">
                <div class="card overflow-hidden">
                    <div class="text-center p-3 overlay-box @if ($r->bank_id == auth()->user()->id || $r->messenger_id == auth()->user()->id) taken @endif @if ($r->messenger_response_at != null) completed @endif" style="background-image: url('images/big/img1.jpg');">
                        <h3 class="mt-3 text-white mb-1 font-bold">{!! $r->elementable->title !!}</h3>
                        <p class="text-white mb-0 text-sm">
                            #{{ $r->reservation->id }}
                        </p>
                    </div>
                    <div class="text-left p-4 text-sm">
                        {!! $r->elementable->summary !!}
                    </div>
                    <ul class="list-group list-group-flush text-sm">
                        @if ($r->elementable->date_start || $r->elementable->date_end)
                            <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Fecha</span> <strong class="text-muted text-right">{{ date('j M, Y', strtotime($r->elementable->date_start)) }} <br/> {{ date('j M, Y', strtotime($r->elementable->date_end)) }}	</strong></li>
                        @endif

                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Entrega</span> <strong class="text-muted text-right text-xs font-black"> {{ $r->elementable->bank_delivery_amount * $r->quantity }} {{ $r->elementable->currencyToString() }} </strong></li>

                        <div class="text-left px-4 pt-4 text-sm">
                            {!! $r->content !!}

                            @if ($r->beneficiary)
                                <button type="button" class="badge badge-primary text-white mb-3" data-bs-toggle="modal" data-bs-target="#modal-beneficiary-{{ $r->id }}-{{ $r->beneficiary->id }}">
                                    <i class="fa fa-check"></i> Beneficiario: {{ $r->beneficiary->name }}
                                </button>
                                <div wire:ignore.self class="modal fade" id="modal-beneficiary-{{ $r->id }}-{{ $r->beneficiary->id }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Datos del Beneficiario</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                @php
                                                    $beneficiary = $r->beneficiary;
                                                @endphp
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
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Datos del reservación del banquero --}}
                        @if ($r->bank_id && $r->bank_id == auth()->user()->id)
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="mb-0">Reservado </span>
                                <strong class="text-muted text-right"> {{ $r->banker->name }} <br/> {{ date('j M, h:i:s', strtotime($r->taken_at)) }} @if ($r->banker_check_at) <br/> <span class="badge badge-success">Confirmado</span> @endif </strong>
                            </li>
                        @endif

                        @if ($r->messenger_id)
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="mb-0">Mensajería</span>
                                <strong class="text-muted text-right text-sm"> {{ $r->messenger->name }} <br/> {{ date('j M, h:i:s', strtotime($r->messenger_taken_at)) }} @if ($r->messenger_check_at) <br/> <span class="badge badge-success">Confirmado</span> @endif </strong>
                            </li>

                            @if ($r->messenger_response_at == null)
                                {{-- <li class="list-group-item d-flex items-right justify-content-between">
                                    <span class="mb-0">Tiempo Restante</span>
                                    <strong class="text-muted">
                                        @php
                                            $remaining = $r->remainingSeconds()
                                        @endphp
                                        {{ $r->remaining() }}
                                    </strong>
                                </li> --}}
                            @else
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="mb-0">Completado</span>
                                    <strong class="text-muted text-right"> {{ date('j M, h:i:s', strtotime($r->messenger_response_at)) }} </strong>
                                </li>
                            @endif

                        @endif
                    </ul>

                    @if ($r->banker && $r->banker->id != auth()->user()->id)
                        {{-- perfil del banquero para que el mensajero lo contacte --}}
                        @hasanyrole('messenger')
                            <div class="text-center mt-3 px-4">
                                <div class="profile-photo flex justify-center">
                                    <img src="{{ $r->banker->profile_photo_url }}" width="100" class="img-fluid rounded-circle" alt="Profile Pic">
                                </div>
                                <h3 class="mt-4 mb-3">{{ $r->banker->name }}</h3>
                                <a class="badge badge-dark badge-xl mt-1 btn-block text-white" href="tel:{{ $r->banker->phone }}"><i class="fa fa-phone"></i> {{ $r->banker->phone }}</a>
                            </div>
                        @endhasanyrole
                    @endif

                    <div class="card-footer border-0 mt-0">
                        <x-jet-action-message class="mr-3" on="saved">
                            {{ __('Saved.') }}
                        </x-jet-action-message>

                        {{-- Completar proceso por parte del mensajero --}}
                        @if ((($r->messenger_id == auth()->user()->id && $r->messenger_response_at == null && $r->banker_check_at && $r->messenger_check_at) || (in_array($r->elementable->bank_currency, ['CUP_TX', 'MLC', 'CRIPTO']) && $r->bank_id == auth()->user()->id)) && $r->messenger_response_at == null)
                            <button type="button" class="badge badge-secondary badge-xl btn-block text-white mb-3" wire:click='togglePolling' data-bs-toggle="modal" data-bs-target="#completeRemittance-{{ $r->id }}">
                                <i class="fa fa-check"></i> Completar
                            </button>

                            <div wire:ignore.self class="modal fade" id="completeRemittance-{{ $r->id }}">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('front.remittance.submit', ['id' => $r->id]) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="modal-header">
                                                <h5 class="modal-title">Completar Remesa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <label for="image" class="form-label">Imagen de documento de identidad</label>
                                                    <input class="form-control" name="image" required type="file" id="image" >
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="message" class="form-label">Descripción Adicional</label>
                                                    <textarea class="form-control" rows="5" name="message" type="textarea" id="message" ></textarea>
                                                </div>
                                                <input type="hidden" name="element" value="{{ $r->id }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" wire:click='togglePolling' class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Enviar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- check entre mensajero y banquero --}}
                        {{-- comienza el banquero --}}
                        @if ($r->bank_id == auth()->user()->id && $r->taken_at && $r->messenger_taken_at && $r->banker_check_at == null)
                            <button type="button" class="badge badge-secondary badge-xl btn-block text-white mb-3 text-sm" wire:click='check({{ $r->id }}, "bank")'>
                                <i class="fa fa-check"></i> Confirmar Entrega
                            </button>
                        @endif

                        {{-- confirma ahora el mensajero --}}
                        @if ($r->messenger_id == auth()->user()->id && $r->taken_at && $r->messenger_taken_at && $r->banker_check_at && $r->messenger_check_at == null)
                            <button type="button" class="badge badge-secondary badge-xl btn-block text-white mb-3 text-sm" wire:click='check({{ $r->id }}, "messenger")'>
                                <i class="fa fa-check"></i> Confirmar Recibo
                            </button>
                        @endif

                        @if ($r->bank_id == auth()->user()->id || $r->messenger_id == auth()->user()->id)
                            @hasallroles('bank|messenger')
                                @if ($r->messenger_id == null && in_array($r->elementable->bank_currency, ['USD', 'EUR', 'CUP']) )
                                    <button class="badge badge-secondary badge-xl btn-block text-white mb-3" wire:click='take({{ $r->id }})'>
                                        <i class="fa fa-bullhorn"></i> Hacer Mensajería
                                    </button>
                                @endif
                            @endhasallroles

                            @if ($r->messenger_response_at == null && (auth()->user()->hasRole('bank') && $r->messenger_check_at == null) || (auth()->user()->hasRole('messenger') && $r->messenger_id == auth()->user()->id && $r->messenger_response == null))
                                <button class="badge badge-danger badge-xl btn-block text-white" wire:click='cancel({{ $r->id }})'>
                                    <i class="fa fa-bullhorn"></i> Cancelar
                                </button>
                            @endif

                            {{-- <button type="button" class="btn btn-light btn-lg btn-block text-white">
                                <i class="fa fa-check"></i> Completado
                            </button> --}}

                        @else
                            @if (in_array($r->elementable->bank_currency, ['USD', 'EUR', 'CUP']) || (in_array($r->elementable->bank_currency, ['CUP_TX', 'MLC', 'CRIPTO']) && $r->bank_id == null))
                                <button class="badge badge-secondary badge-xl btn-block text-white" wire:click='take({{ $r->id }})'>
                                    <i class="fa fa-bullhorn"></i> Reservar
                                </button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
