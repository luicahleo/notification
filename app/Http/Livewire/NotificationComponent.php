<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationComponent extends Component
{

    // propiedades
    public $notifications, $count;

    // metodo mount, sirve para que ni bien se cargue el componente quiero que 
    // me traiga las notificaciones que tiene un usuario, asi como todas las notificaciones
    public function mount()
    {
        $this->notifications = auth()->user()->notifications;
        // existen dos tipos de notificaciones, leidas y no leidas
        // para las no leidas
        $this->count = auth()->user()->unreadNotifications->count();
    }


    public function render()
    {
        return view('livewire.notification-component');
    }
} 