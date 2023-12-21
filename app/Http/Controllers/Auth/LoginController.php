<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    //methode showLoginForm
    public function showLoginForm()
    {
        return view('auth.login');
    }

    //methode login
    public function login(Request $request)
    {
        //validation des champs
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        //tentative de connexion
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->withInput()->with('statut', 'Identifiants incorrects');

        }
        Log::info('Connexion réussie pour l\'email : ' . $request->email);
        //redirection user avec isUser
        if (auth()->user()->isUser()) {
            Log::info('Connexion réussie pour l\'email : ' . $request->email);
            return redirect()->route('user.dashboard')->with('statut', 'Vous êtes connecté en tant qu\'utilisateur');
        }

        //redirection admin avec isAdmin
        if (auth()->user()->isAdmin()) {
            Log::info('Connexion réussie pour l\'email : ' . $request->email);
            return redirect()->route('admin.dashboard')->with('status', 'Vous êtes connecté en tant qu\'administrateur');
        }

        //function logout

    }

    //methode logout redirect to /
    public function logout()
    {
        auth()->logout();
        return redirect()->route('home')->with('status', 'Vous êtes déconnecté');
    }
}
