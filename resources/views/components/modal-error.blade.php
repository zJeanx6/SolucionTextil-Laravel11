<!-- Overlay (fondo gris) -->
<div id="overlay-error" class="fixed inset-0 bg-black opacity-50 @if ($show) block @else hidden @endif"></div>

<!-- Modal de Error de Creación -->
<div id="modal-error" class="fixed z-10 inset-0 overflow-y-auto @if ($show) block @else hidden @endif">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md text-center">
            <svg class="w-16 h-16 text-red-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            <h2 class="text-xl font-bold mb-4">Error al crear usuario</h2>
            <p class="mb-4">Revisa la información e intenta nuevamente.</p>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="closeErrorModal()">Revisar</button>
        </div>
    </div>
</div>

<script>
    function closeErrorModal() {
        document.getElementById('modal-error').classList.add('hidden');
        document.getElementById('overlay-error').classList.add('hidden');
    }
</script>
