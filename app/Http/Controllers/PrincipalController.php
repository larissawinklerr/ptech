<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    // Página pública
    public function principal()
    {
        return view('site.principal'); // certifique-se que esse arquivo existe
    }

    // Painel após login
    public function painel()
    {
        return view('app.painel');
    }
}

