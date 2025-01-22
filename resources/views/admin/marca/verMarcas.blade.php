<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Marcas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Lista de Marcas</h1>
                    <div class="mb-4 text-right">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="document.getElementById('modal-create').classList.remove('hidden'); document.getElementById('overlay').classList.remove('hidden')">Agregar Marca</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200">Nombre</th>
                                    <th class="py-2 px-4 border-b border-gray-200">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($marcas as $marca)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $marca->nombre }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200 flex">
                                            <div class="mx-auto">
                                                <button class="bg-blue-500 hover:bg-blue-700 font-bold text-white py-1 px-2 rounded" onclick="openEditModal({{ $marca->id }}, '{{ $marca->nombre }}')">Actualizar</button>
                                                <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="bg-red-500 hover:bg-red-700 font-bold text-white py-1 px-2 rounded">Eliminar</button>
                                                </form>
                                            </div>
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

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden"></div>

    <!-- Modal Crear -->
    <div id="modal-create" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-xl font-bold mb-4">Agregar Nueva Marca</h2>
                <form action="{{ route('marcas.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre de la Marca:</label>
                        <input type="text" name="nombre" id="nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('nombre') }}">
                        @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="text-right">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="document.getElementById('modal-create').classList.add('hidden'); document.getElementById('overlay').classList.add('hidden')">Cancelar</button>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <div id="modal-edit" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-xl font-bold mb-4">Actualizar Marca</h2>
                <form id="form-edit" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="edit-nombre" class="block text-sm font-medium text-gray-700">Nombre de la Marca:</label>
                        <input type="text" name="nombre" id="edit-nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="text-right">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="document.getElementById('modal-edit').classList.add('hidden'); document.getElementById('overlay').classList.add('hidden')">Cancelar</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openEditModal(id, nombre) {
            document.getElementById('edit-nombre').value = nombre;
            document.getElementById('form-edit').action = '/admin/marca/editar-marcas/' + id;
            document.getElementById('modal-edit').classList.remove('hidden');
            document.getElementById('overlay').classList.remove('hidden');
        }
    </script>
</x-app-layout>
