<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{

    public function index()
    {
        //make pagination
        $inscriptions = Inscription::where('etat', 'en_cours')->paginate(10);

        return view('admin.inscriptions.index', compact('inscriptions'));
    }


    public function approve($id)
    {
        $inscription = Inscription::findOrFail($id);
        $inscription->etat = 'valide';
        $inscription->save();

        // ... Code pour notifier l'utilisateur ...

        return redirect()->route('inscriptions.index')->with('success', 'Inscription approuvée.');
    }

    public function reject($id)
    {
        $inscription = Inscription::findOrFail($id);
        $inscription->etat = 'rejete';
        $inscription->save();

        // ... Code pour notifier l'utilisateur ...

        return redirect()->route('inscriptions.index')->with('error', 'Inscription rejetée.');
    }
}
