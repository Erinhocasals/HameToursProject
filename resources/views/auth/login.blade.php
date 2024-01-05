@extends('layouts.admin.auth')

@section('content')
    <x-jet-authentication-card>

        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <h2>{{ __('Login') }}</h2>

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="float-right text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            @if (app('request')->input('referral'))
                <x-jet-input id="referral" class="hidden" type="hidden" name="referral" value="{{ app('request')->input('referral') }}" required />
            @endif

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm btn btn-sm light btn-dark" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>

            <hr>

            <div class="mt-4">
                <a class="text-sm btn btn-sm light btn-dark w-full" href="{{ url('/auth/github/redirect') }}">
                    <i class="fab fa-github"></i> Inicia sesión con Github
                </a>
            </div>
            <div class="mt-4">
                <a class="text-sm btn btn-sm btn-google-plus w-full" href="{{ url('/auth/google/redirect') }}">
                    <i class="fab fa-google-plus"></i> Inicia sesión con Google
                </a>
            </div>
            <div class="mt-4">
                <a class="text-sm btn btn-sm btn-google w-full" href="{{ url('/auth/facebook/redirect') }}">
                    <i class="fab fa-facebook"></i> Inicia sesión con Facebook
                </a>
            </div>

        </form>
    </x-jet-authentication-card>
@endsection
