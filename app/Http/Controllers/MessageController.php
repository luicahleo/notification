<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;
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
    }



}
