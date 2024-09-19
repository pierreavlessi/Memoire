<?php

namespace App\Http\Controllers;

use App\Models\TypeActivite;
use Illuminate\Http\Request;

class TypeActiviteController extends Controller
{
    public function index()
    {
        $typeactivite = TypeActivite::all();
        return view("admin.typeactivite.index", compact("typeactivite"));
    }

    public function create()
    {
        return view('admin.typeactivite.typeactivite');
    }

    public function save(Request $request)
    {
        $request->validate([
            'libelle_type' => 'required|string|max:255',
        ]);

        TypeActivite::create($request->all()); // Créer un nouveau type d'activité

        return redirect()->route('typeactivite.index')->with('success', 'Type d\'activité créé avec succès.');
    }

   // public function edit(TypeActivite $typeActivite)
   // {
    //    return view('typeactivites.edit', compact('typeActivite')); // Formulaire d'édition
    //}

   // public function update(Request $request, TypeActivite $typeActivite)
    //{
       // $request->validate([
       //     'libelle_type' => 'required|string|max:255',
        //]);

        //$typeActivite->update($request->all()); // Mettre à jour le type d'activité

        //return redirect()->route('typeactivites.index')->with('success', 'Type d\'activité mis à jour avec succès.');
   // }

   // public function destroy(TypeActivite $typeActivite)
   // {
        //$typeActivite->delete(); // Supprimer le type d'activité

       // return redirect()->route('typeactivites.index')->with('success', 'Type d\'activité supprimé avec succès.');
    //}
}
