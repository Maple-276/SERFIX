<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Controller extends Controller
{
    /**
     * Muestra la página principal.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        $userProfile = $user->userProfile;
        // Pasar el usuario a la vista
        return view('welcome', compact('user'));
    }
}