<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formations;

class FormationController extends Controller
{
    //controller 
    public function index()
    {
        $formations = Formations::with(['domaine', 'sessions'])->get();
        return view('formations', ['formations' => $formations]);
    }
}
