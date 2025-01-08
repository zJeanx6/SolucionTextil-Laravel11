@extends('layouts.appIndex')

@section('title', 'Recuperar Contraseña')

@section('content')

    <section class="flex items-center justify-center min-h-screen">
        <div class="container mx-auto flex justify-center items-center">
            <div class="w-full max-w-md">
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('¿Olvidaste tu contraseña? No hay problema. Solo dinos tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}" class="bg-white p-6 rounded-lg shadow-lg">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">{{ __('Email') }}</label>
                        <input type="email" name="email" id="email" 
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required autofocus value="{{ old('email') }}">
                        @error('email')
                            <div class="text-red-500 mt-2">{{ __($message) }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">
                            {{ __('Enviar enlace de restablecimiento de contraseña') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
