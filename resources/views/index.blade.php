<!DOCTYPE html>
<html lang="es">
  
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soluciones Textiles</title>
  <!-- Tailwind CSS desde CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .containerFondo {
      background-image: url('{{ asset('img/index/fondoPrincipal.jpg') }}');
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>

<body>
  <div class="containerFondo">

    <header class="mb-8">
      <img src="{{ asset('img/index/logoSenaPrincipal.png') }}" alt="Logo SENA" class="h-24">
    </header>

    <main class="text-center">
      <h1 class="text-5xl font-bold text-white mb-8 bg-black bg-opacity-50 p-4 rounded-lg shadow-lg">SOLUCIONES TEXTILES</h1>
      <div class="space-x-4">
        <a href="{{ route('sobre-nosotros') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">SOBRE NOSOTROS</a>
        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">INICIAR SESIÓN</a>
      </div>
    </main>
    
  </div>
</body>
</html>
