<!DOCTYPE html>
<html lang="es">
  
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soluciones Textiles</title>
  <link rel="stylesheet" href="{{ asset('css/stylesIndex.css') }}">
</head>

<body>
  <div class="containerFondo">

    <header class="header">
      <img src="{{ asset('img/index/logoSenaPrincipal.png') }}" alt="Logo SENA" class="logo">
    </header>

    <main class="main">
      <h1 class="title">SOLUCIONES TEXTILES</h1>
      <div class="buttons">
        <a href="{{ route('sobre-nosotros') }}" class="btn">SOBRE NOSOTROS</a>
        <a href="{{ route('login') }}" class="btn">INICIAR SESIÓN</a>
      </div>
    </main>
    
  </div>
</body>
</html>
