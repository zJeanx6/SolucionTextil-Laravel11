<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sin Titulo...')</title>
    <!-- Tailwind CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Incluir el encabezado -->
    @include('includes.headerIndex')

    <!-- Contenido principal de la vista -->
    @yield('content')

    <!-- Incluir el pie de página -->
    @include('includes.footerIndex')
</body>

</html>
