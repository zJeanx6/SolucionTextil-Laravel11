<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Lista de Usuarios</h1>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200">Documento</th>
                                    <th class="py-2 px-4 border-b border-gray-200">Nombre</th>
                                    <th class="py-2 px-4 border-b border-gray-200">Apellido</th>
                                    <th class="py-2 px-4 border-b border-gray-200">Email</th>
                                    <th class="py-2 px-4 border-b border-gray-200">Contacto</th>
                                    <th class="py-2 px-4 border-b border-gray-200">Rol</th>
                                    <th class="py-2 px-4 border-b border-gray-200">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $usuario->id }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $usuario->nombre }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $usuario->apellido }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $usuario->email }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $usuario->contacto }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $usuario->rol->nombre }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="bg-blue-500 hover:bg-blue-700 font-bold text-white py-1 px-2 rounded">Actualizar</a>
                                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-red-500 hover:bg-red-700 font-bold text-white py-1 px-2 rounded">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
