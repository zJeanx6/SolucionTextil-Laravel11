<?php
// <!-- {{-- REVISADO Y COMENTADO --}} -->
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Envía una nueva notificación de verificación de correo electrónico.
     */
    public function store(Request $request): RedirectResponse
    {
        // Verifica si el usuario ya ha verificado su correo electrónico
        if ($request->user()->hasVerifiedEmail()) {
            // Redirige al usuario al dashboard si ya ha verificado su correo
            return redirect()->intended(route('dashboard', absolute: false));
        }

        // Envía una nueva notificación de verificación de correo electrónico
        $request->user()->sendEmailVerificationNotification();

        // Redirige de vuelta con un mensaje de estado
        return back()->with('status', 'verification-link-sent');
    }
}
