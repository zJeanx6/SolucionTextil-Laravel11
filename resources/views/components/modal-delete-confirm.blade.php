<!-- Overlay (fondo gris) -->
<div id="overlay-delete-confirm" class="fixed inset-0 bg-black opacity-50 hidden"></div>

<!-- Modal de Confirmación de Eliminación -->
<div id="modal-delete-confirm" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md text-center">
            <svg class="w-16 h-16 text-yellow-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            <h2 class="text-xl font-bold mb-4">Confirmar Eliminación</h2>
            <p class="mb-4">{{ $message }}</p>
            <form id="form-delete" method="POST" action="{{ $action }}">
                @csrf
                @method('DELETE')
                <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeDeleteConfirmModal()">Cancelar</button>
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(action, message = '¿Estás seguro de que deseas eliminar este elemento?') {
        document.getElementById('form-delete').action = action;
        document.getElementById('modal-delete-confirm').querySelector('p').textContent = message;
        document.getElementById('modal-delete-confirm').classList.remove('hidden');
        document.getElementById('overlay-delete-confirm').classList.remove('hidden');
    }

    function closeDeleteConfirmModal() {
        document.getElementById('modal-delete-confirm').classList.add('hidden');
        document.getElementById('overlay-delete-confirm').classList.add('hidden');
    }
</script>
