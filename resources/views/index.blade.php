<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="containerFondo bg-cover bg-center h-screen flex flex-col justify-between items-center" style="background-image: url('../img/index/fondoPrincipal.jpg');">
            <!-- Header -->
            <header class="w-full p-5 flex justify-end">
                <img src="{{ asset('img/index/logoSenaPrincipal.png') }}" alt="Logo Soluciones Textiles" class="max-w-xs">
            </header>

            <!-- Main Content -->
            <main class="flex flex-col justify-center items-center flex-1">
                <h1 class="text-5xl font-bold text-white mb-5 border-gradient">Bienvenido a Soluciones Textiles</h1>
                <div class="flex gap-4">
                    <a href="{{ route('sobre-nosotros') }}" class="btn bg-blue-600 hover:bg-blue-800 text-white py-2 px-4 rounded">Sobre Nosotros</a>
                    <a href="{{ route('login') }}" class="btn bg-blue-600 hover:bg-blue-800 text-white py-2 px-4 rounded">Iniciar Sesión</a>
                    {{-- <a href="{{ route('register') }}" class="btn bg-green-600 hover:bg-green-800 text-white py-2 px-4 rounded">Registrarse</a> --}}
                </div>
            </main>

            <!-- Footer -->
            <footer class="w-full p-5 text-center text-white">
                &copy; {{ date('Y') }} Soluciones Textiles. Todos los derechos reservados.
            </footer>
        </div>
    </body>
</html>
