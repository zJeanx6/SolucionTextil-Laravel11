<!-- {{-- REVISADO Y COMENTADO --}} -->

<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RoleRedirectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Auth\PasswordResetLinkController;

// Route::get('/test-email', function () {
//     Mail::raw('Este es un correo de prueba', function ($message) {
//         $message->to('daniela_manrique@soy.sena.edu.co')->subject('Correo de prueba');
//     });

//     return 'Correo enviado';
// });

// Ruta para la página principal
Route::get('/', [IndexController::class, 'index']);

// Ruta para la página "Sobre Nosotros"
Route::get('/sobre-nosotros', [IndexController::class, 'sobreNosotros'])->name('sobre-nosotros');

Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware(['guest'])
    ->name('password.request');

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware(['guest'])
    ->name('password.email');

// Grupo de rutas para usuarios con rol de administrador
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    // Ruta para el dashboard de administrador
    Route::get('/admin/dashboard', [RoleRedirectController::class, 'admin'])->name('dashboard');
    // Ruta para almacenar usuarios
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    // Ruta para la creación de usuarios
    Route::get('/admin/crear-usuarios', [UsuarioController::class, 'create'])->name('admin.crearUsuarios');
    // Ruta para ver usuarios
    Route::get('/admin/ver-usuarios', [RoleRedirectController::class, 'usuarios'])->name('ver-usuarios');
});

// Grupo de rutas para usuarios con rol de mantenimiento
Route::middleware(['auth', 'verified', 'role:mantenimiento'])->group(function () {
    // Ruta para el dashboard de mantenimiento
    Route::get('/mantenimiento/dashboard', [RoleRedirectController::class, 'mantenimiento'])->name('mantenimiento');
});

// Grupo de rutas para usuarios autenticados
Route::middleware('auth')->group(function () {
    // Ruta para editar perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Ruta para actualizar perfil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Ruta para eliminar perfil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ruta para acceso denegado
Route::get('/access-denied', function () {
    return view('errors.access-denied');
})->name('access-denied');

// Rutas de autenticación
require __DIR__.'/auth.php';
