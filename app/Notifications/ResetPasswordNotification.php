<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Determine qué canales deben ser usados para la notificación.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];  // Indicamos que la notificación se enviará por correo electrónico.
    }

    /**
     * Obtener el mensaje de correo electrónico para la notificación.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Restablecer contraseña')
            ->line('Recibiste este correo porque hemos recibido una solicitud de restablecimiento de contraseña para tu cuenta.')
            ->action('Restablecer la contraseña', url(route('password.reset', $this->token, false)))
            ->line('Este enlace de restablecimiento de contraseña caducará en 60 minutos.')
            ->line('Si no solicitaste un restablecimiento de contraseña, no es necesario realizar ninguna acción.')
            ->salutation('Saludos, Soluciones Textiles');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

