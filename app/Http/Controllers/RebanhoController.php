<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RebanhoController extends Controller
{
    public function index() {
        $Rebanho = ['Rebanho 1'];

        return view('app.rebanho.index', compact('rebanho'));
    }
}
