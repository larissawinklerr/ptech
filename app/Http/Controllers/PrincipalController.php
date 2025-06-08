<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal()
    {
        return view('site.principal');
    }

    public function painel()
    {
        return view('app.painel');
    }
}
