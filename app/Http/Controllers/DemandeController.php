<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemandeController extends Controller
{
    public function index()
    {
        // Vous pouvez passer des données dynamiques ici si nécessaire
        return view('admin.demandes');
    }
}
