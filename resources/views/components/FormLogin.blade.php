<form action="{{ route('login') }}" method="POST" enctype="multipart/form-data" class="w-100 mx-auto p-4 bg-white rounded shadow" style="max-width: 400px;">
    @csrf

    <h1 class="text-center mb-4">{{ $title ?? 'Sin titulo...'}}</h1>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese su Email" required>
    </div>

    <div class="mb-3">
        <label for="pass" class="form-label">Contraseña:</label>
        <input type="password" name="pass" id="pass" class="form-control" placeholder="Ingrese su Contraseña" required>
    </div>
    
    <div class="text-center">
        <button type="submit" name="enviar" class="btn btn-success w-100" style="background-color: #39a900;">Ingresar</button>
    </div>
</form>
