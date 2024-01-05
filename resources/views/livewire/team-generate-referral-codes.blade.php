<div class="mt-10 sm:mt-0">
    <x-jet-action-section>
        <x-slot name="title">
            {{ __('Generate Referral Codes') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Generate Referral Codes Description') }}
        </x-slot>

        <x-slot name="content">

            <div class="flex justify-end mb-5 items-center">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Done.') }}
                </x-jet-action-message>
                <button type="button" wire:click="generate()" class="btn btn-warning btn-sm ms-1">{{ __('Generate Referral Codes') }}</button>
            </div>

            <div class="col-span-6 sm:col-span-6 mb-5">
                <div class="text-sm text-gray-600">
                    {{ __('Generate Referral Codes Description') }}
                </div>
            </div>

            <div class="space-y-6">
                @foreach ($teamInvitations as $invitation)
                    @if ($invitation->referral && $invitation->generic)
                        <div class="flex items-center justify-between gap-2">
                            {{-- <div class="text-gray-600">{{ $invitation->email }}</div> --}}
                            <button class="cursor-pointer text-sm text-left text-yellow-500 focus:outline-none min-w-0"
                                                wire:click="copyToClipboard({{ $invitation->id }})">
                                {{ route('register', ['referral' => $invitation->referral]) }}
                            </button>

                            <div class="text-center">
                                <a target="_blank" href="https://api.whatsapp.com/send?text={{ route('register', ['referral' => $invitation->referral]) }}" title="WhatsApp">
                                    <button class="btn btn-xs sharp me-1"><svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Facebook</title><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></button>
                                </a>
                                <a href="http://twitter.com/share?text={{ route('register', ['referral' => $invitation->referral]) }}" title="Twitter">
                                    <button class="btn btn-xs sharp me-1"><svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Twitter</title><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg></button>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('register', ['referral' => $invitation->referral]) }}" title="Linkedin">
                                    <button class="btn btn-xs sharp me-1"><svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>LinkedIn</title><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></button>
                                </a>
                                <a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl={{ route('register', ['referral' => $invitation->referral]) }}" title="Tumblr">
                                    <button class="btn btn-xs sharp me-1"><svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Tumblr</title><path d="M14.563 24c-5.093 0-7.031-3.756-7.031-6.411V9.747H5.116V6.648c3.63-1.313 4.512-4.596 4.71-6.469C9.84.051 9.941 0 9.999 0h3.517v6.114h4.801v3.633h-4.82v7.47c.016 1.001.375 2.371 2.207 2.371h.09c.631-.02 1.486-.205 1.936-.419l1.156 3.425c-.436.636-2.4 1.374-4.156 1.404h-.178l.011.002z"/></svg></button>
                                </a>
                                <a href="whatsapp://send?text={{ route('register', ['referral' => $invitation->referral]) }}" title="WhatsApp">
                                    <button class="btn btn-xs sharp me-1"><svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>WhatsApp</title><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg></button>
                                </a>
                                <a href="https://telegram.me/share/url?url={{ route('register', ['referral' => $invitation->referral]) }}" title="Telegram">
                                    <button class="btn btn-xs sharp me-1"><svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Telegram</title><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg></button>
                                </a>
                            </div>



                            <div class="flex items-center">
                                {{-- @if (Gate::check('removeTeamMember', $team)) --}}
                                    <!-- Cancel Team Invitation -->
                                    <button class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none"
                                                        wire:click="cancelTeamInvitation({{ $invitation->id }})">
                                        {{ __('Cancel') }}
                                    </button>
                                {{-- @endif --}}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </x-slot>
    </x-jet-action-section>
</div>
