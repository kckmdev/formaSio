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
        $inscriptions = Inscription::where('etat_paiement', 'en_cours')->paginate(10);

        return view('admin.inscriptions.index', compact('inscriptions'));
    }


    public function approve($id)
    {
        $inscription = Inscription::findOrFail($id);
        $inscription->etat_paiement = 'approuvee';
        $inscription->save();

        // ... Code pour notifier l'utilisateur ...

        return redirect()->route('admin.inscriptions.index')->with('success', 'Inscription approuvée.');
    }

    public function reject($id)
    {
        $inscription = Inscription::findOrFail($id);
        $inscription->etat_paiement = 'rejetee';
        $inscription->save();

        // ... Code pour notifier l'utilisateur ...

        return redirect()->route('admin.inscriptions.index')->with('error', 'Inscription rejetée.');
    }
}
