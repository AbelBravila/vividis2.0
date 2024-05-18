<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/style.css') }}"/>

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            {{-- <x-authentication-card-logo /> --}}
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endsession

        <form method="POST" action="{{ route('sesion') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Usuario') }}" />
                <input
                    class="form-control"
                    id="name" type="user" name="name" required="required" autocomplete="name">
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <div class="form-outline">
                    <a href="/" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-4">
                        Regresar
                    </a>
                </div>
                <x-button class="ms-4">
                    {{ __('Iniciar Sesión') }}
                </x-button>


            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
