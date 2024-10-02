<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    public function index()
    {
        $specialite = specialite::all();
        return view("admin.specialite.index", compact("specialite"));
    }

    public function create()
    {
        return view('admin.specialite.specialite');
    }

    public function save(Request $request)
    {
        $request->validate([
            'libelle_spec' => 'required|string|max:255',
        ]);

        specialite::create($request->all()); // Créer un nouveau type d'activité

        return redirect()->route('specialite.index')->with('success', 'Type d\'activité créé avec succès.');
    }
}
