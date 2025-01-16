<!-- {{-- REVISADO Y COMENTADO --}} -->

<x-app-layout>
    <x-slot name="header">
        <!-- Título del Dashboard -->
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido al menú de administración') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Mensaje de bienvenida -->
                    {{ __("¡Has iniciado sesión!") }}
                    <h1>Es genial tenerte de regreso {{ Auth::user()->nombre }}, con rol: {{ Auth::user()->rol->nombre }}.</h1>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
