@extends('layouts.appIndex')

@section('title', 'Restablecer Contraseña')

@section('content')

    <section class="flex items-center justify-center min-h-screen">
        <div class="container mx-auto flex justify-center items-center">
            <div class="w-full max-w-md">
                <form method="POST" action="{{ route('password.store') }}" class="bg-white p-6 rounded-lg shadow-lg">
                    <h1 class="text-center text-2xl font-bold mb-4">Restablecer Contraseña</h1>
        
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">{{ __('Email') }}</label>
                        <input type="email" name="email" id="email" 
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required autofocus autocomplete="username" value="{{ old('email', $request->email) }}">
                        @error('email')
                            <div class="text-red-500 mt-2">{{ __($message) }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">{{ __('Password') }}</label>
                        <input type="password" name="password" id="password" 
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required autocomplete="new-password">
                        @error('password')
                            <div class="text-red-500 mt-2">{{ __($message) }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700">{{ __('Confirm Password') }}</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" 
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required autocomplete="new-password">
                        @error('password_confirmation')
                            <div class="text-red-500 mt-2">{{ __($message) }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">
                            {{ __('Restablecer Contraseña') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
