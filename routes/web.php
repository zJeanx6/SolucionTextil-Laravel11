<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RoleRedirectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/sobre-nosotros', [IndexController::class, 'sobreNosotros'])->name('sobre-nosotros');



Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [RoleRedirectController::class, 'admin'])->name('dashboard');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/admin/crear-usuarios', [UsuarioController::class, 'create'])->name('admin.crearUsuarios');
    Route::get('/admin/ver-usuarios', [RoleRedirectController::class, 'usuarios'])->name('ver-usuarios');


});

Route::middleware(['auth', 'verified', 'role:mantenimiento'])->group(function () {

    Route::get('/mantenimiento/dashboard', [RoleRedirectController::class, 'mantenimiento'])->name('mantenimiento');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/access-denied', function () {
    return view('errors.access-denied');
})->name('access-denied');

require __DIR__.'/auth.php';
