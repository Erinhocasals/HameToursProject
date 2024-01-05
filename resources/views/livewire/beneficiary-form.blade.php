<x-jet-form-section submit="create">
    <x-slot name="title">
        {{ $template->title }} <br/>
        <span class="text-sm">{{ $template->subtitle }}</span>
    </x-slot>

    <x-slot name="description">
        <div class="leading-6">{!! $template->content !!}</div>
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-6">
            @include('badge-errors')
        </div>

        <!-- Nombre -->
        <div class="col-span-6 sm:col-span-6">
            <label class="capitalize block font-medium text-sm text-gray-700" for="name">Nombre Completo <span class="text-red-500">*</span> </label>
            <x-jet-input id="name" type="text" class="mt-1 block w-full" required wire:model="name"/>
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Identity Number -->
        <div class="col-span-6 sm:col-span-6">
            <label class="capitalize block font-medium text-sm text-gray-700" for="identification">No. Identidad <span class="text-red-500">*</span> </label>
            <x-jet-input id="identification" type="text" class="mt-1 block w-full" required wire:model="identification"/>
            <x-jet-input-error for="identification" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="col-span-6 sm:col-span-6">
            <label class="capitalize block font-medium text-sm text-gray-700" for="phone">Teléfonos <span class="text-red-500">*</span> </label>
            <x-jet-input id="phone" type="text" class="mt-1 block w-full" required wire:model="phone"/>
            <x-jet-input-error for="area" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-6">
            <label class="capitalize block font-medium text-sm text-gray-700" for="email">Correo</label>
            <x-jet-input id="email" type="text" class="mt-1 block w-full" wire:model="email"/>
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="col-span-6 sm:col-span-6">
            <label class="capitalize block font-medium text-sm text-gray-700" for="address">Dirección <span class="text-red-500">*</span> </label>
            <x-jet-input id="address" type="text" class="mt-1 block w-full" required wire:model="address"/>
            <x-jet-input-error for="address" class="mt-2" />
        </div>

        {{-- Location --}}
        <div class="col-span-6 sm:col-span-6">
            <label class="capitalize block font-medium text-sm text-gray-700" for="location">Localización <span class="text-red-500">*</span> </label>
            <div class="row align-items-center">
                <div class="w-full my-1">
                    <select name="location" class="form-control wide single-select " id="beneficiaries-location-dropdown" required wire:model='location_id'>
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

@push('post_styles')

@endpush

@push('scripts')
<script src="{{ asset('admin-template/js/plugins-init/select2-init.js') }}"></script>
<script>
    $('#beneficiaries-location-dropdown').on('change', function(e) {
        let value = $(this).val();
        console.log(value);
        @this.set("location_id", value);
    })
</script>
@endpush
