<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Colores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Lista de Colores</h1>
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="document.getElementById('modal-create').classList.remove('hidden'); document.getElementById('overlay').classList.remove('hidden')">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200">Nombre</th>
                                    <th class="py-2 px-4 border-b border-gray-200">Código</th>
                                    <th class="py-2 px-4 border-b border-gray-200">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colores as $color)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $color->nombre }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $color->codigo }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200 flex">
                                            <div class="mx-auto">
                                                <button class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded" onclick="openEditModal({{ $color->id }}, '{{ $color->nombre }}', '{{ $color->codigo }}')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded" onclick="openDeleteModal({{ $color->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
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
                <h2 class="text-xl font-bold mb-4">Agregar Nuevo Color</h2>
                <form action="{{ route('colores.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Color:</label>
                        <input type="text" name="nombre" id="nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('nombre') }}">
                        @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="codigo" class="block text-sm font-medium text-gray-700">Código del Color:</label>
                        <input type="text" name="codigo" id="codigo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('codigo') }}">
                        @error('codigo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
                <h2 class="text-xl font-bold mb-4">Actualizar Color</h2>
                <form id="form-edit" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="edit-nombre" class="block text-sm font-medium text-gray-700">Nombre del Color:</label>
                        <input type="text" name="nombre" id="edit-nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="edit-codigo" class="block text-sm font-medium text-gray-700">Código del Color:</label>
                        <input type="text" name="codigo" id="edit-codigo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('codigo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="text-right">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="document.getElementById('modal-edit').classList.add('hidden'); document.getElementById('overlay').classList.add('hidden')">Cancelar</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmación de Eliminación -->
    <div id="modal-delete-confirm" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded shadow-lg w-full max-w-md text-center">
                <svg class="w-16 h-16 text-yellow-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <h2 class="text-xl font-bold mb-4">Confirmar Eliminación</h2>
                <p class="mb-4">¿Estás seguro de que deseas eliminar este color?</p>
                <form id="form-delete" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeDeleteModal()">Cancelar</button>
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openEditModal(id, nombre, codigo) {
            document.getElementById('edit-nombre').value = nombre;
            document.getElementById('edit-codigo').value = codigo;
            document.getElementById('form-edit').action = '/admin/color/editar-colores/' + id;
            document.getElementById('modal-edit').classList.remove('hidden');
            document.getElementById('overlay').classList.remove('hidden');
        }

        function openDeleteModal(id) {
            document.getElementById('form-delete').action = '/admin/color/eliminar-colores/' + id;
            document.getElementById('modal-delete-confirm').classList.remove('hidden');
            document.getElementById('overlay').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('modal-delete-confirm').classList.add('hidden');
            document.getElementById('overlay').classList.add('hidden');
        }
    </script>
</x-app-layout>
