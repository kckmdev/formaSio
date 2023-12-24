<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Formations;

class InscriptionController extends Controller
{
    //afficher le formulaire d'inscription

    public function show(Request $request)
    {
        // Get the full URL
        $url = $request->fullUrl();
        
        // Extract the query part of the URL
        $query = parse_url($url, PHP_URL_QUERY);
        
        // Assume the query part is the ID you're looking for
        $id = $query;
        
        // Find the formation by the extracted ID
        $formation = Formations::find($id);
    
        // Pass the formation to the view
        return view('inscription', ['formation' => $formation]);
    }
    



}
