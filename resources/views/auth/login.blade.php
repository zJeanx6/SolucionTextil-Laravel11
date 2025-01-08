@extends('layouts.appIndex')

@section('title', 'Inicio de Sesión')

@section('content')

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="flex items-center justify-center min-h-screen">
        <div class="container mx-auto flex justify-center items-center">
            <div class="w-full max-w-md">
                <form method="POST" action="{{ route('login') }}" class="bg-white p-6 rounded-lg shadow-lg">
                    <h1 class="text-center text-2xl font-bold mb-4">Inicio De Sesión</h1>
        
                    @csrf
        
                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email:</label>
                        <input type="email" name="email" id="email" 
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Ingrese su Email" required autofocus autocomplete="username" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-red-500 mt-2">{{ __($message) }}</div>
                        @enderror
                    </div>
        
                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Contraseña:</label>
                        <input type="password" name="password" id="password" 
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Ingrese su Contraseña" required autocomplete="current-password">
                        @error('password')
                            <div class="text-red-500 mt-2">{{ __($message) }}</div>
                        @enderror
                    </div>
        
                    {{-- Si deseas incluir "Recuerdame" --}}
                    {{-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                        <label class="form-check-label" for="remember_me">Recuerdame</label>
                    </div> --}}
        
                    <div class="text-center">
                        @if (Route::has('password.request'))
                            <a class="block mb-3 text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                        
                        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">
                            Ingresar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
