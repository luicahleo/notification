<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationComponent extends Component
{   
 
    // para poder escuchar un componente
    protected $listeners = ['notification']; // una vez que escucha el evento, va a tratar de ejecutar un metodo con el mismo nombre

    // propiedades
    public $notifications, $count;

    // metodo mount, sirve para que ni bien se cargue el componente quiero que 
    // me traiga las notificaciones que tiene un usuario, asi como todas las notificaciones
    public function mount()
    {
        // $this->notifications = auth()->user()->notifications;
        // // existen dos tipos de notificaciones, leidas y no leidas
        // // para las no leidas
        // $this->count = auth()->user()->unreadNotifications->count();
    
        // como estoy repitiendo codigo, mejor ejecuto el metodo notification()
        $this->notification();
    }


    // este metodo se ejecuta cada vez que el componente escucha el evento
    public function notification()
    {
        $this->notifications = auth()->user()->notifications;
        $this->count = auth()->user()->unreadNotifications->count();

    }

    public function render()
    {
        return view('livewire.notification-component');
    }
} 