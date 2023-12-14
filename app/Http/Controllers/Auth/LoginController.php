<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //methode showLoginForm
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
}
