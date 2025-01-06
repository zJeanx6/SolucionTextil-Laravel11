<!-- {{-- REVISADO Y COMENTADO --}} -->

<nav x-data="{ open: false, openUsers: false }" class="bg-white border-b border-gray-100">
    <!-- MENÚ DE NAVEGACIÓN -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- LOGO DE LARAVEL -->
                {{-- <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div> --}}

                <!-- LOGO DE SOLUCIONES TEXTILES -->
                <div class="shrink-0 flex items-center ml-4">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('img/SolucionesTextilesSinFondo.png') }}" alt="Logo Soluciones Textiles" class="img-fluid" style="max-height: 60px;">
                    </a>
                </div>
                <!-- BOTONES DE NAVEGACIÓN -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <!-- Botón de Dashboard -->
                    <button class="inline-flex items-center px-3 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out {{ request()->routeIs('dashboard') ? 'text-gray-900 border-b-2 border-indigo-400' : '' }}">
                        <a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                    </button>
                </div>
                <!-- MENÚ DESPLEGABLE DE USUARIOS -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <!-- Botón del menú desplegable de usuarios -->
                            <button @click="openUsers = ! openUsers" class="inline-flex items-center px-3 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out {{ request()->routeIs('ver-usuarios') || request()->routeIs('admin.crearUsuarios') ? 'text-gray-900 border-b-2 border-indigo-400' : '' }}">
                                <div>{{ __('Usuarios') }}</div>
                                <div class="ms-1">  
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <!-- Opciones del menú desplegable de usuarios -->
                            <x-dropdown-link :href="route('ver-usuarios')" :active="request()->routeIs('ver-usuarios')">
                                {{ __('Ver Usuarios') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('admin.crearUsuarios')" :active="request()->routeIs('admin.crearUsuarios')">
                                {{ __('Crear Usuario') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
            <!-- MENÚ DESPLEGABLE DE CONFIGURACIÓN -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <!-- Botón del menú desplegable de configuración -->
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <!-- Opciones del menú desplegable de configuración -->
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <!-- Autenticación -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            <!-- Botón de menú hamburguesa para dispositivos móviles -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Menú de navegación responsivo -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
        <!-- Menú desplegable de usuarios responsivo -->
        <div class="pt-2 pb-3 space-y-1 border-t border-gray-200">
            <button @click="openUsers = ! openUsers" class="w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out {{ request()->routeIs('ver-usuarios') || request()->routeIs('admin.crearUsuarios') ? 'text-gray-900 border-b-2 border-indigo-400' : '' }}">
                {{ __('Usuarios') }}
            </button>
            <div :class="{'block': openUsers, 'hidden': ! openUsers}" class="hidden space-y-1">
                <x-responsive-nav-link :href="route('ver-usuarios')" :active="request()->routeIs('ver-usuarios')">
                    {{ __('Ver Usuarios') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.crearUsuarios')" :active="request()->routeIs('admin.crearUsuarios')">
                    {{ __('Crear Usuario') }}
                </x-responsive-nav-link>
            </div>
        </div>
        <!-- Opciones de configuración responsivas -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <!-- Autenticación -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
