<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageSent;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //Este controlador tiene dos acciones
    // el primero es mostrar el mensaje
    public function show(Message $message)
    {
        return view('messages.show' , compact('message'));
   
    }

    // la segunda accion es guardar el mensaje
    public function store(Request $request)
    {
        // validamos
        $request->validate([
            'subject' => 'required|min:10',
            'body'  => 'required|min:10',
            'to_user_id' => 'required|exists:users,id',  //requerido, pero que debe existir en la tabla users en el campo id
        ]);

        $message = Message::create([
            'subject' =>  $request->subject,
            'body' => $request->body,
            'from_user_id' => auth()->id(),
            'to_user_id' => $request->to_user_id,
        ]);

        // recuperamos el usuario al cual queremos enviar la notificacion
        $user = User::find($request->to_user_id);
        $user->notify(new MessageSent($message));



        // genero dos variables de sesion para usar el componente <x-jet-banner
        $request->session()->flash('flash.banner', 'Tu mensaje fue enviado');
        $request->session()->flash('flash.bannerStyle', 'success');

        // retorna a la anterior pagina
        return redirect()->back();


    }



}
