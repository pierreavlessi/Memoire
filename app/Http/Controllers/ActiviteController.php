<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    public function index()
    {
        $activite = Activite::all();
        return view("admin.activite.index", compact("activite"));
    }

    public function create()
    {
        return view('admin.activite.activite');
    }

    public function save(Request $request)
    {
        
        $request->validate([
            'libelle_activite' => 'required|string|max:255',
            'description' => 'required|string',
            'id_type' => 'required|exists:type_activites,id', // Vérifie que le type existe
            'status' => 'required|string|max:50',
        ]);
    
        Activite::create($request->all());
        return redirect()->route('activite.index')->with('success', 'Activité créée avec succès !');
     
        }
}