@extends('layouts.appIndex')

@section('title', 'Inicio de Sesión')

@section('content')

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <body>
        <section class="sobreNosotros" style="height: 80vh; display: flex; align-items: center;">
            <div class="container d-flex justify-content-center align-items-center" style="flex: 1;">
                <div class="row w-100">
                    <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data" 
                        class="mx-auto p-4 bg-white rounded shadow" style="max-width: 600px;">
                        <h1 class="text-center mb-4">Inicio De Sesión</h1>
        
                        @csrf
        
                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" 
                                class="form-control" placeholder="Ingrese su Email" required autofocus autocomplete="username" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger mt-2">{{ 'Credenciales incorrectas' }}</div>
                            @enderror
                        </div>
        
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="password" name="password" id="password" 
                                class="form-control" placeholder="Ingrese su Contraseña" required autocomplete="current-password">
                            @error('password')
                                <div class="text-danger mt-2">{{ 'Credenciales incorrectas' }}</div>
                            @enderror
                        </div>
        
                        {{-- Si deseas incluir "Recuerdame" --}}
                        {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                            <label class="form-check-label" for="remember_me">Recuerdame</label>
                        </div> --}}
        
                        <div class="text-center">
                            @if (Route::has('password.request'))
                                <a class="d-block mb-3 text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            @endif
                            

                            <button type="submit" class="btn btn-success w-100" style="background-color: #39a900;">
                                Ingresar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

@endsection
