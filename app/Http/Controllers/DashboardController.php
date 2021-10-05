<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //


    public function index()
    {
        // trae todos los usuarios cuyo id sean diferentes al usuario actualmente autenticado
        $users = User::where('id', '<>', auth()->user()->id)->get();



        return view('dashboard', compact('users'));
    }
}
