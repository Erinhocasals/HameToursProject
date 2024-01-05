<div>
    <x-jet-action-message class="mr-3" on="saved">
        {{ __('Saved.') }}
    </x-jet-action-message>
    @if ($otherTeam)
        <div class="alert alert-danger solid show">
            <strong>{{ __('Warning') }}!</strong> {{ __('You belong to ') }} {{ auth()->user()->currentTeam->name }}
            {{-- <button type="button" wire:click="leaveTeam()" class="badge badge-sm light badge-danger ms-1">{{ __('Leave Team') }}</button> --}}
        </div>
    @endif
</div>
