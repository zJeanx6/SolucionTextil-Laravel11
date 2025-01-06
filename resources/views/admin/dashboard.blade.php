<!-- {{-- REVISADO Y COMENTADO --}} -->

<x-app-layout>
    <x-slot name="header">
        <!-- Título del Dashboard -->
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Mensaje de bienvenida -->
                    <h1>Hola administrador</h1>
                    {{ __("You're logged in!") }}
                    <!-- Información del usuario autenticado -->
                    <p>Nombre: {{ Auth::user()->nombre }}</p>
                    <p>Rol: {{ Auth::user()->rol->nombre }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
