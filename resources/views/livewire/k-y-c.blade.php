<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ $template->title }} <span class="text-sm">{{ $template->subtitle }}</span>
    </x-slot>

    <x-slot name="description">
        <div class="leading-6">{!! $template->content !!}</div>
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-6">
            @include('badge-errors')
        </div>

        @if (auth()->user()->kyc)
            <div class="col-span-6 sm:col-span-6">
                @if (auth()->user()->kyc->approved == false)
                    <span class="badge light badge-light italic">Esperando confirmación</span>
                @else
                    <span class="badge light badge-success">Aprobado</span>
                @endif
            </div>
        @endif

        <div class="col-span-6 sm:col-span-6">
            <label for="image" class="form-label">Imagen de documento de identidad</label>
            <input class="form-control" name="image" type="file" id="image" wire:model="image" >
        </div>

        <!-- Identity Number -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="identity" value="No. Identidad" />
            <x-jet-input id="identity" type="text" class="mt-1 block w-full" required wire:model="identity"/>
            <x-jet-input-error for="identity" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="address" value="Dirección" />
            <x-jet-input id="address" type="text" class="mt-1 block w-full" required wire:model="address"/>
            <x-jet-input-error for="address" class="mt-2" />
        </div>

        <!-- Area de Trabajo -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="area" value="Seleccione las localidades donde va a operar" />
            {{-- <x-jet-input id="area" type="text" class="mt-1 block w-full" required wire:model="area"/> --}}

            <div class="row align-items-center">
                <div class="w-full my-1" wire:ignore>
                    <select id="location-dropdown" class="me-sm-2 multi-select form-control wide" multiple="multiple" wire:model='municipalities' >
                        @php
                            $first_group = count($locations) > 0 ? $locations[0]->provincia : null;
                        @endphp
                        @foreach ($locations as $location)
                            @if ($location->provincia != $first_group || $loop->index == 0)
                                @if ($loop->index > 0)
                                    </optgroup>
                                @endif

                                <optgroup label="{{ $location->provincia }}" >
                                    <option value="{{ $location->id }}" >{{ $location->municipio }}</option>
                            @else
                                <option value="{{ $location->id }}" >{{ $location->municipio }}</option>
                            @endif

                            @php
                                $first_group = $location->provincia;
                            @endphp
                        @endforeach

                        </optgroup>
                    </select>
                </div>
            </div>
            <x-jet-input-error for="area" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>

@push('scripts')
<script>
    $(function(){
        $.fn.select2.amd.require(["optgroup-data", "optgroup-results"],
            function (OptgroupData, OptgroupResults) {
            $('#location-dropdown').select2({
                dataAdapter: OptgroupData,
                resultsAdapter: OptgroupResults,
                closeOnSelect: true,
                placeholder: "Seleccione ...",
            }).val({{ auth()->user()->kyc ? auth()->user()->kyc->locations->pluck('id') : '' }}).trigger('change');
        });
    });

    $('#location-dropdown').on('change', function(e) {
        let value = $(this).val();
        console.log(value);
        @this.set("municipalities", value);
    })
</script>
@endpush
