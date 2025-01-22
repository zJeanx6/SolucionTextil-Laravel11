<!-- {{-- REVISADO Y COMENTADO --}} -->

<?php

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RoleRedirectController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MarcaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

    //Rutas para el control de USUARIOS
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');     // Ruta para almacenar usuarios
    Route::get('/admin/crear-usuarios', [UsuarioController::class, 'create'])->name('admin.crearUsuarios');     // Ruta para la creación de usuarios
    Route::get('/admin/ver-usuarios', [UsuarioController::class, 'index'])->name('ver-usuarios');    // Ruta para ver usuarios
    Route::get('/admin/editar-usuario/{id}', [UsuarioController::class, 'edit'])->name('usuarios.edit');    // Rutas para editar usuarios
    Route::put('/admin/editar-usuario/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/admin/eliminar-usuario/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');     // Ruta para eliminar usuarios

    //Rutas para el control de ROLES
    Route::post('/roles', [RolController::class, 'store'])->name('roles.store');     // Ruta para almacenar roles
    Route::get('/admin/rol/ver-roles', [RolController::class, 'index'])->name('ver-roles');     // Ruta ver roles
    Route::put('/admin/rol/editar-roles/{id}', [RolController::class, 'update'])->name('roles.update');     // Ruta para actualizar roles
    Route::delete('/admin/rol/eliminar-roles/{id}', [RolController::class, 'destroy'])->name('roles.destroy');     // Ruta para eliminar roles

    // Rutas para el control de ESTADOS
    Route::post('/estados', [EstadoController::class, 'store'])->name('estados.store');     // Ruta para almacenar estados
    Route::get('/admin/estado/ver-estados', [EstadoController::class, 'index'])->name('ver-estados');     // Ruta ver estados
    Route::put('/admin/estado/editar-estados/{id}', [EstadoController::class, 'update'])->name('estados.update');     // Ruta para actualizar estados
    Route::delete('/admin/estado/eliminar-estados/{id}', [EstadoController::class, 'destroy'])->name('estados.destroy');     // Ruta para eliminar estados

    // Rutas para el control de MARCAS
    Route::post('/marcas', [MarcaController::class, 'store'])->name('marcas.store');     // Ruta para almacenar marcas
    Route::get('/admin/marca/ver-marcas', [MarcaController::class, 'index'])->name('ver-marcas');     // Ruta ver marcas
    Route::put('/admin/marca/editar-marcas/{id}', [MarcaController::class, 'update'])->name('marcas.update');     // Ruta para actualizar marcas
    Route::delete('/admin/marca/eliminar-marcas/{id}', [MarcaController::class, 'destroy'])->name('marcas.destroy');     // Ruta para eliminar marcas
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
