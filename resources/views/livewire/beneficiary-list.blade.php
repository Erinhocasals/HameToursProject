<div>
    <x-jet-form-section submit="tx">
        <x-slot name="title">
            {{ $template->title }} <br/>
            <span class="text-sm">{{ $template->subtitle }}</span>
        </x-slot>

        <x-slot name="description">
            <div class="leading-6">{!! $template->content !!}</div>
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 lg:col-span-6 form-wrapper">
                <x-jet-input-error for="role" class="mt-2" />

                <div class="row">
                    <div id="DZ_W_Todo1" class="widget-media dz-scroll">
                        <ul class="timeline">
                            @foreach (auth()->user()->beneficiaries as $beneficiary)
                                <li>
                                    <div class="timeline-panel">
                                        <div class="media me-2 media-primary">
                                            {{ substr($beneficiary->name, 0, 1) }}
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-0">{{ $beneficiary->name }} <strong class="text-primary">{{ $beneficiary->identification }}</strong></h6>
                                            <p class="mb-0">{{ $beneficiary->address }} <span class="badge badge-sm light badge-secondary">{{ $beneficiary->location->municipio }}</span></p>
                                            @if ($beneficiary->email)
                                            <a href="mailto:{{ $beneficiary->email }}"><strong class="text-secondary">{{ $beneficiary->email }}</strong></a><br/>
                                            @endif
                                            <a href="tel:{{ $beneficiary->phone }}"><strong class="text-secondary">{{ $beneficiary->phone }}</strong></a>
                                        </div>
                                        <div class="dropdown">
                                            <button type="button" wire:click="delete({{ $beneficiary->id }})" class="shadow btn btn-danger btn-xs sharp me-1 sweet-success-cancel" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        @if (count(auth()->user()->beneficiaries) == 0)
                            <div class="alert alert-danger solid alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="mdi mdi-btn-close"></i></span>
                                </button>
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="mt-1 mb-2 text-white">Vacío</h5>
                                        <p class="mb-0">No tiene ningún beneficiario creado, debe crear al menos 1 beneficiario para poder reservar alguna remesa.</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>
        </x-slot>
    </x-jet-form-section>
</div>
