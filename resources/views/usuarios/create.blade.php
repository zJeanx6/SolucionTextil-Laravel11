<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page_title ?? 'Crear Usuario' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="form-wrapper">
        <div class="form-container">
            <form action="{{ route('usuarios.store') }}" method="POST" id="form__registerUser">
                @csrf
                <h1 class="form-header">Crea un nuevo usuario</h1>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Usuario" value="{{ old('nombre') }}">
                                @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido del Usuario" value="{{ old('apellido') }}">
                                @error('apellido') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Correo electrónico" value="{{ old('email') }}">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="contacto" class="form-label">Contacto:</label>
                                <input type="text" class="form-control" name="contacto" id="contacto" placeholder="Número de contacto" value="{{ old('contacto') }}">
                                @error('contacto') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirmar contraseña">
                            </div>
                            <div class="mb-3">
                                <label for="rolId" class="form-label">Rol:</label>
                                <select class="form-control" name="rolId">
                                    <option value="">Selecciona rol</option>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}" {{ old('rolId') == $rol->id ? 'selected' : '' }}>{{ $rol->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('rolId') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-success w-50" type="submit">Confirmar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
