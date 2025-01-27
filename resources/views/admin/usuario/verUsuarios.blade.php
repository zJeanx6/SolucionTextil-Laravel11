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
                    <div class="mb-4 text-right">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="document.getElementById('modal-create').classList.remove('hidden'); document.getElementById('overlay').classList.remove('hidden')">Agregar Usuario</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200">Nombre</th>
                                    <th class="py-2 px-4 border-b border-gray-200">Apellido</th>
                                    <th class="py-2 px-4 border-b border-gray-200">Email</th>
                                    <th class="py-2 px-4 border-b border-gray-200">Contacto</th>
                                    <th class="py-2 px-4 border-b border-gray-200">Rol</th>
                                    <th class="py-2 px-4 border-b border-gray-200">Estado</th>
                                    <th class="py-2 px-4 border-b border-gray-200">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $usuario->nombre }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $usuario->apellido }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $usuario->email }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $usuario->contacto }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $usuario->rol->nombre }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $usuario->estado->nombre }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            <button class="bg-blue-500 hover:bg-blue-700 font-bold text-white py-1 px-2 rounded" onclick="openEditModal({{ $usuario->id }}, '{{ $usuario->nombre }}', '{{ $usuario->apellido }}', '{{ $usuario->email }}', '{{ $usuario->contacto }}', {{ $usuario->rol->id }}, {{ $usuario->estado->id }})">Actualizar</button>
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

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden"></div>

    <!-- Modal Crear -->
    <div id="modal-create" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-xl font-bold mb-4">Agregar nuevo Usuario</h2>
                <form action="{{ route('usuarios.store') }}" method="POST" id="form__registerUser">
                    @csrf
                    <div class="mb-4" id= "grupo__id">
                        <label for="id" class="block text-sm font-medium text-gray-700">Documento:</label>
                        <input type="number" name="id" id="id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('id') }}" required>
                        <i class="formulario__validacion-estado"></i>
                        <p class="formulario__input-error text-red-500 text-sm hidden">El documento debe ser un número válido.</p>
                        @error('id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4" id="grupo__nombre">
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('nombre') }}" required>
                        <i class="formulario__validacion-estado"></i>
                        <p class="formulario__input-error text-red-500 text-sm hidden">El nombre debe tener de 3 a 40 letras.</p>
                        @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4" id="grupo__apellido">
                        <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido:</label>
                        <input type="text" name="apellido" id="apellido" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('apellido') }}" required>
                        <i class="formulario__validacion-estado"></i>
                        <p class="formulario__input-error text-red-500 text-sm hidden">El apellido debe tener de 3 a 40 letras.</p>
                        @error('apellido') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4" id="grupo__email">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('email') }}" required>
                        <i class="formulario__validacion-estado"></i>
                        <p class="formulario__input-error text-red-500 text-sm hidden">Algo esta mal con su correo.</p>
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4" id="grupo__contacto">
                        <label for="contacto" class="block text-sm font-medium text-gray-700">Contacto:</label>
                        <input type="number" name="contacto" id="contacto" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('contacto') }}" required>
                        <i class="formulario__validacion-estado"></i>
                        <p class="formulario__input-error text-red-500 text-sm hidden">El numero de contacto puede tener hasta 10 numeros.</p>
                        @error('contacto') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4" id="grupo__password">
                        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña:</label>
                        <input type="password" name="password" id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <i class="formulario__validacion-estado"></i>
                        <p class="formulario__input-error text-red-500 text-sm hidden">La contraseña solo puede tener de 8 a 12 caracteres.</p>
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4" id="grupo__password_confirmation">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <i class="formulario__validacion-estado"></i>
                        <p class="formulario__input-error text-red-500 text-sm hidden">La contraseña no coincide.</p>
                        @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="rolId" class="block text-sm font-medium text-gray-700">Rol:</label>
                        <select name="rolId" id="rolId" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="">Seleccione un rol</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}" {{ old('rolId') == $rol->id ? 'selected' : '' }}>{{ $rol->nombre }}</option>
                            @endforeach
                        </select>
                        @error('rolId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="estadoId" class="block text-sm font-medium text-gray-700">Estado:</label>
                        <select name="estadoId" id="estadoId" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="">Seleccione un estado</option>
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->id }}" {{ old('estadoId') == $estado->id ? 'selected' : '' }}>{{ $estado->nombre }}</option>
                            @endforeach
                        </select>
                        @error('estadoId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="text-right">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="document.getElementById('modal-create').classList.add('hidden'); document.getElementById('overlay').classList.add('hidden')">Cancelar</button>
                        <button type="submit" id="guardar"class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <div id="modal-edit" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-xl font-bold mb-4">Actualizar Usuario</h2>
                <form id="form-edit" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="edit-id" class="block text-sm font-medium text-gray-700">Documento:</label>
                        <input type="text" name="id" id="edit-id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="edit-nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                        <input type="text" name="nombre" id="edit-nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="edit-apellido" class="block text-sm font-medium text-gray-700">Apellido:</label>
                        <input type="text" name="apellido" id="edit-apellido" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('apellido') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="edit-email" class="block text-sm font-medium text-gray-700">Email:</label>
                        <input type="email" name="email" id="edit-email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="edit-contacto" class="block text-sm font-medium text-gray-700">Contacto:</label>
                        <input type="text" name="contacto" id="edit-contacto" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('contacto') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="edit-password" class="block text-sm font-medium text-gray-700">Contraseña:</label>
                        <input type="password" name="password" id="edit-password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Dejar en blanco para mantener la contraseña actual">
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="edit-password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña:</label>
                        <input type="password" name="password_confirmation" id="edit-password_confirmation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Confirmar contraseña">
                    </div>
                    <div class="mb-4">
                        <label for="edit-rolId" class="block text-sm font-medium text-gray-700">Rol:</label>
                        <select name="rolId" id="edit-rolId" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="">Seleccione un rol</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                            @endforeach
                        </select>
                        @error('rolId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="edit-estadoId" class="block text-sm font-medium text-gray-700">Estado:</label>
                        <select name="estadoId" id="edit-estadoId" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="">Seleccione un estado</option>
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                            @endforeach
                        </select>
                        @error('estadoId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
        function openEditModal(id, nombre, apellido, email, contacto, rolId, estadoId) {
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-nombre').value = nombre;
            document.getElementById('edit-apellido').value = apellido;
            document.getElementById('edit-email').value = email;
            document.getElementById('edit-contacto').value = contacto;
            document.getElementById('edit-rolId').value = rolId;
            document.getElementById('edit-estadoId').value = estadoId;
            document.getElementById('form-edit').action = '/admin/editar-usuario/' + id;
            document.getElementById('modal-edit').classList.remove('hidden');
            document.getElementById('overlay').classList.remove('hidden');
        }
    </script>
@vite('resources/js/Validaciones/crearUsuario.js')

</x-app-layout>
