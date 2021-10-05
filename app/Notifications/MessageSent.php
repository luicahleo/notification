<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageSent extends Notification
{
    use Queueable;

    // propiedad message
    public $message;


    /**
     * Create a new notification instance.
     * En el constructor recibo el mensaje, por eso he agredado $message ahi
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // correos electronicos, database
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        // personalizamos el mensaje
                    ->subject('Tienes un nuevo mensaje')
                    ->greeting('Hola')
                    ->line('Para leer tu mensaje haz click en el boton.')
                    ->action('Ver mensaje', route('messages.show', $this->message->id))
                    ->line('Hasta luego!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            //pedimos que retorne dos valores o mas valores
            // mensaje y 
            'url' => route('messages.show', $this->message->id),
            'message' => 'has recibido un mensaje de ' . User::find($this->message->from_user_id)->name,
        ];
    }
}
