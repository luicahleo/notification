<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // habilitamos asignacion masiva
    // con esta propiedad le decimos que nos permita modificar cualquier campo, menos el 'id', ahora si podemos hacer la migracion nuevamente
    protected $guarded = ['id'];
}
