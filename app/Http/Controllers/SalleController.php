<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salle;


class SalleController extends Controller
{
    //
    public function create()
   {

   
       return view('admin.salle.salle');
      }

      public function index()
      {
        //
        //$Profils = Profil::latest()->get();
        $salle = Salle::all();
        return view("admin.salle.index", compact("salle"));
      }

      public function save(Request $request)
      
    {
      $salle = $request->salle;
      $findsalle = Salles::where('salle', $salle)->first();
        // Valider les données entrantes
        $request->validate([
            'libelle_salle' => 'required|string|max:255',
            'capacite' => 'required|integer',
            'equipement' => 'nullable|string',
            'disponibilite' => 'required|boolean',
            'type_salle' => 'required|string|max:255',
            'batiment' => 'required|string|max:255',
            'responsable' => 'nullable|string|max:255',
        ]);

        // Créer une nouvelle instance de Salle avec les données validées
        $salle = new Salle($request->all());

        // Sauvegarder l'instance dans la base de données
        $salle->save();

        // Rediriger ou retourner une réponse
        return redirect()->route('salles')->with('success', 'Salle créée avec succès.');
    }
    }
