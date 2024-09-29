<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnneeAcademiqueController extends Controller
{
    public function index()
    {
        $anneeacademique = AnneeAcademique::all();
        return view("admin.anneeacademique.index", compact("anneeacademique"));
    }

    public function create()
    {
        return view('admin.anneeacademique.anneeacademique');
    }

    public function save(Request $request)
    {
        $request->validate([
            'annee' => 'required|string|max:255',
        ]);

        AnneeAcademique::create($request->all()); // Créer un nouveau type d'activité

        return redirect()->route('anneeacademique.index')->with('success', 'Année académique créée avec succès.');
    }
}
