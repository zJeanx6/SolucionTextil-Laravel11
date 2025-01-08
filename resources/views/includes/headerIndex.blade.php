<?php
$page_title = isset($page_title) ? $page_title : "Sin Titulo...";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page_title }}</title>
    <!-- Tailwind CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center">
            <!-- Logo y Texto "Soluciones Textiles" -->
            <a class="flex items-center" href="{{ url('/') }}">
                <img src="{{ asset('img/index/logoSenaPrincipal.png') }}" alt="Logo" class="h-16">
                <span class="ml-2 font-semibold text-xl">Soluciones Textiles</span>
            </a>
            <!-- Menu De Opciones Banner -->
            <div class="flex space-x-4">
                <a class="text-gray-700 hover:text-gray-900" href="{{ url('/') }}">Volver</a>
            </div>
        </div>
    </nav>
