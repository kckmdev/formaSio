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
            'password' => 'required'
        ]);

        //essaie de connexion
        if (!auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            Log::warning('Tentative de connexion échouée pour l\'email : ' . $request->email);
            return back()->withInput()->with('statut', 'Identifiants incorrects');
        }

        Log::info('Connexion réussie pour l\'email : ' . $request->email);
        //redirection user avec isUser
        if (auth()->user()->isUser()) {
            Log::info('Connexion réussie pour l\'email : ' . $request->email);
            return redirect()->route('menu')->with('statut', 'Vous êtes connecté en tant qu\'utilisateur');
        }


        //redirection admin avec isAdmin
        if (auth()->user()->isAdmin()) {
            Log::info('Connexion réussie pour l\'email : ' . $request->email);
            return redirect()->route('admin.dashboard')->with('status', 'Vous êtes connecté en tant qu\'administrateur');
        }


    }

    //methode logout redirect to /
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
