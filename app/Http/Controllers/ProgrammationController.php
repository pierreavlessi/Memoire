<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programmation;

class ProgrammationController extends Controller
{
    public function create()
    {
 
    
        return view('admin.programmation.programmation');
       }
 
       public function index()
       {
         //
         //$Profils = Profil::latest()->get();
         $programmation = Programmation::all();
         return view("admin.programmation.index", compact("programmation"));
       }
 
       public function save(Request $request)
       
     {
       $programmation = $request->programmation;
       $findprogrammation = Progammations::where('programmation', $programmation)->first();
         // Valider les données entrantes
         
            $validatedData = $request->validate([
                'id_salle' => 'required|integer',
                'id_util' => 'required|integer',
                'id_activite' => 'required|integer',
                'date' => 'required|date',
                'heure_deb' => 'required|date_format:H:i',
                'heure_fin' => 'required|date_format:H:i|after:heure_deb',
                'statut' => 'required|string',
                'description' => 'nullable|string',
    
         ]);
 
         // Créer une nouvelle instance de Salle avec les données validées
         $programmation = new Programmation($request->all());
 
         // Sauvegarder l'instance dans la base de données
         $programmation->save();
 
         // Rediriger ou retourner une réponse
         return redirect()->route('programmations')->with('success', 'Programmation créée avec succès.');
     }
}
