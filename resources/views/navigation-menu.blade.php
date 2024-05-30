<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <!-- Primary Navigation Menu -->
    <div class="mx-auto ps-5 px-20 sm:px-20 lg:px-20">
        {{-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> --}}
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a class="navbar-brand" href="{{ route('inicioL') }}">Vividi´Salon</a>
                    {{-- <a href="{{ route('/') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a> --}}
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('inicioL') }}" :active="request()->routeIs('inicioL')">
                        {{ __('Inicio') }}
                    </x-nav-link>
                </div>
{{-- 
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('usuarios') }}" :active="request()->routeIs('usuarios')">
                        {{ __('Usuarios') }}
                    </x-nav-link>
                </div> --}}

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('usuarios') }}" :active="request()->routeIs('usuarios')">
                        {{ __('Usuarios') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('usuarios') }}" :active="request()->routeIs('usuarios')">
                        {{ __('Especialidades') }}
                    </x-nav-link>
                </div>

                {{-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('Contactanos.index') }}" :active="request()->routeIs('Contactanos.index')">
                        {{ __('Proveedores') }}
                    </x-nav-link>
                </div> --}}

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('usuarios') }}" :active="request()->routeIs('usuarios')">
                        {{ __('Personal') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('usuarios') }}" :active="request()->routeIs('usuarios')">
                        {{ __('Citas') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('CerrarSesion') }}" :active="request()->routeIs('CerrarSesion')">
                        {{ __('Cerrar Sesión') }}
                    </x-nav-link>
                </div>

                {{-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('Empleados.index') }}" :active="request()->routeIs('Empleados.index')">
                        {{ __('Empleados') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('Departamentos.index') }}" :active="request()->routeIs('Departamentos.index')">
                        {{ __('Departamentos') }}
                    </x-nav-link>
                </div> --}}
            </div>
            
            <!-- Hamburger -->
            <div class="-me-2 pe-4 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">


        <div class="space-y-1">
            <x-responsive-nav-link href="{{ route('inicioL') }}" :active="request()->routeIs('inicioL')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
        </div>


        <div class="space-y-1">
            <x-responsive-nav-link href="{{ route('usuarios') }}" :active="request()->routeIs('usuarios')">
                {{ __('Usuarios') }}
            </x-responsive-nav-link>
        </div>

       

        <div class="space-y-1">
            <x-responsive-nav-link href="{{ route('inicioL') }}" :active="request()->routeIs('inicioL')">
                {{ __('Especialidades') }}
            </x-responsive-nav-link>
        </div>

        <div class="space-y-1">
            <x-responsive-nav-link href="{{ route('personal') }}" :active="request()->routeIs('personal')">
                {{ __('Personal') }}
            </x-responsive-nav-link>
        </div>

        <div class="space-y-1">
            <x-responsive-nav-link href="{{ route('inicioL') }}" :active="request()->routeIs('inicioL')">
                {{ __('Citas') }}
            </x-responsive-nav-link>
        </div>

        <div class="space-y-1">
            <x-responsive-nav-link href="{{ route('CerrarSesion') }}" :active="request()->routeIs('CerrarSesion')">
                {{ __('Cerrar Sesión') }}
            </x-responsive-nav-link>
        </div>

        {{-- <div class="space-y-1">
            <x-responsive-nav-link href="{{ route('Empleados.index') }}" :active="request()->routeIs('Empleados.index')">
                {{ __('Empleados') }}
            </x-responsive-nav-link>
        </div>

        <div class="space-y-1">
            <x-responsive-nav-link href="{{ route('Departamentos.index') }}" :active="request()->routeIs('Departamentos.index')">
                {{ __('Departamentos') }}
            </x-responsive-nav-link>
        </div> --}}
    </div>
</nav>
