<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientmoralController extends Controller
{
    //gestion des connexions déconnexion
    public function __construct()
    {
        $this->middleware('auth');
    }
}
