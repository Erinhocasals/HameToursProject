<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Manage Roles') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Manage Role Description') }}
    </x-slot>

    <x-slot name="form">
        @if (count($roles) > 0)

            <div class="col-span-6 sm:col-span-6">
                @include('badge-errors')
            </div>

            <div class="col-span-6 lg:col-span-6">
                <x-jet-label for="role" value="{{ __('Role') }}" />
                <x-jet-input-error for="role" class="mt-2" />

                <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer">
                    @foreach ($roles as $index => $role)
                        <button type="button"  wire:click="update({{ $role->id }})" class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 {{ $index > 0 ? 'border-t border-gray-200 rounded-t-none' : '' }} {{ ! $loop->last ? 'rounded-b-none' : '' }}">
                            <div class="@if (!Auth::user()->hasRole($role)) opacity-50 @endif">
                                <!-- Role Name -->
                                <div class="flex items-center">
                                    <div class="text-sm text-gray-600 font-semibold }}">
                                        {{ $role->title }}
                                    </div>

                                    @if (Auth::user()->hasRole($role))
                                        <svg class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    @endif

                                    <x-jet-action-message class="ml-3 mr-3" on="message-{{ $role->id }}">
                                        {{ __('Done.') }}
                                    </x-jet-action-message>
                                </div>

                                <!-- Role Description -->
                                <div class="mt-2 text-xs text-gray-600 text-left">
                                    {!! $role->content !!}
                                </div>
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>

        @endif
    </x-slot>

</x-jet-form-section>
