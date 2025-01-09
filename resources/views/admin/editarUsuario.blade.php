<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="form-wrapper">
                        <div class="form-container">
                            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" id="form__updateUser">
                                @csrf
                                @method('PUT')
                                <h1 class="form-header text-2xl font-bold mb-6">Editar Usuario</h1>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <div class="mb-4">
                                            <label for="id" class="block text-sm font-medium text-gray-700">Documento:</label>
                                            <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" name="id" id="id" value="{{ old('id', $usuario->id) }}">
                                            @error('id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                                            <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" name="nombre" id="nombre" value="{{ old('nombre', $usuario->nombre) }}">
                                            @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido:</label>
                                            <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" name="apellido" id="apellido" value="{{ old('apellido', $usuario->apellido) }}">
                                            @error('apellido') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                                            <input type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" name="email" id="email" value="{{ old('email', $usuario->email) }}">
                                            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mb-4">
                                            <label for="contacto" class="block text-sm font-medium text-gray-700">Contacto:</label>
                                            <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" name="contacto" id="contacto" value="{{ old('contacto', $usuario->contacto) }}">
                                            @error('contacto') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="password" class="block text-sm font-medium text-gray-700">Contraseña:</label>
                                            <input type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" name="password" id="password" placeholder="Dejar en blanco para mantener la contraseña actual">
                                            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña:</label>
                                            <input type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" name="password_confirmation" id="password_confirmation" placeholder="Confirmar contraseña">
                                        </div>
                                        <div class="mb-4">
                                            <label for="rolId" class="block text-sm font-medium text-gray-700">Rol:</label>
                                            <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" name="rolId">
                                                <option value="">Selecciona rol</option>
                                                @foreach ($roles as $rol)
                                                    <option value="{{ $rol->id }}" {{ old('rolId', $usuario->rolId) == $rol->id ? 'selected' : '' }}>{{ $rol->nombre }}</option>
                                                @endforeach
                                            </select>
                                            @error('rolId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-6">
                                    <button class="bg-green-500 hover:bg-green-700 font-bold text-white py-2 px-4 rounded w-1/2" type="submit">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('form__updateUser');
        const inputs = form.querySelectorAll('input[required], select[required]');

        inputs.forEach(input => {
            input.addEventListener('input', function () {
                if (input.checkValidity()) {
                    input.classList.remove('border-red-500');
                    input.classList.add('border-green-500');
                } else {
                    input.classList.remove('border-green-500');
                    input.classList.add('border-red-500');
                }
            });
        });
    });
</script>
