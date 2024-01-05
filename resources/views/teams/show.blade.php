@extends((auth()->user()->hasAnyRole('admin|super-admin|agency')) ? 'layouts.admin.global' : 'layouts.frontend.global');

@php
    $logo = "logo-black.png";
@endphp

@section('post_styles')
    <link rel="stylesheet" href="{{ asset('front-template/css/custom.css') }}">
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
    </style>
@endsection

@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Team Settings') }}</a></li>
        </ol>
    </div>

    <div>
        <div class="w-4/5 max-w-7xl mx-auto sm:py-10 sm:px-6 lg:px-8">
            @livewire('teams.update-team-name-form', ['team' => Auth::user()->ownedTeams()->first()])

            <x-jet-section-border />
            @livewire('team-generate-referral-codes')

            @livewire('teams.team-member-manager', ['team' => Auth::user()->ownedTeams()->first()])

            @if (Gate::check('delete', $team) && ! $team->personal_team)
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('teams.delete-team-form', ['team' => $team])
                </div>
            @endif
        </div>
    </div>
@endsection


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Team Settings') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('teams.update-team-name-form', ['team' => Auth::user()->ownedTeams()->first()])

            @livewire('teams.team-member-manager', ['team' => Auth::user()->ownedTeams()->first()])

            @if (Gate::check('delete', $team) && ! $team->personal_team)
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('teams.delete-team-form', ['team' => $team])
                </div>
            @endif
        </div>
    </div>
</x-app-layout> --}}
