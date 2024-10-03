<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use App\Models\TypeSalle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    //
    public function create()
    {
        // dd(DB::select("select type from types_salles"));

        $typesSalles = TypeSalle::all();
        $salles = Salle::orderBy('created_at', 'desc')->get();

        return view('admin.salle.salle', compact("typesSalles", "salles"));
    }

    public function index()
    {
        //$Profils = Profil::latest()->get();
        $salle = Salle::all();
        return view("admin.salle.index", compact("salle"));
    }

    public function save(Request $request)
    {
        // Valider les données entrantes
        $request->validate([
            'libelle' => 'required|string|max:255',
            'capacite' => 'required|integer',
            'equipement' => 'nullable|string',
            'type_salle' => 'required',
            'batiment' => 'required|string|max:255',
            'responsable' => 'nullable|string|max:255',
        ]);

        // Vérifier si la salle existe déjà
        $findsalle = Salle::where('libelle', $request->libelle)->first();

        if ($findsalle) {
            // Si la salle existe, retourner un message d'erreur
            return redirect()->back()->with('error', 'Cette salle existe déjà.');

        }

        // Créer une nouvelle instance de Salle avec les données validées
        $salle = new Salle([
            'libelle' => $request->libelle,
            'capacite' => $request->capacite,
            'equipement' => $request->equipement,
            'disponibilite' => 0, // Assigner la disponibilité par défaut
            'type_salle_id' => $request->type_salle,
            'batiment' => $request->batiment,
            'responsable' => $request->responsable,
        ]);

        // Sauvegarder l'instance dans la base de données
        $salle->save();

        // Rediriger ou retourner une réponse
        return redirect()->back()->with('insert', 'Salle créée avec succès.');
    }

    public function update(Request $request, $id)
    {
        // Valider les données entrantes
        $request->validate([
            'libelle' => 'required|string|max:255',
            'capacite' => 'required|integer',
            'equipement' => 'nullable|string',
            'type_salle' => 'required',
            'batiment' => 'required|string|max:255',
            'responsable' => 'nullable|string|max:255',
        ]);

        // Trouver la salle par ID
        $salle = Salle::find($id);

        // Vérifier si la salle existe
        if (!$salle) {
            return redirect()->back()->with('error', 'Salle non trouvée.');
        }

        // Mettre à jour les données de la salle
 
        $salle->libelle =  $request->libelle;
        $salle->capacite = $request->capacite;
        $salle->equipement = $request->equipement;
        $salle->type_salle_id = $request->type_salle;
        $salle->batiment = $request->batiment;
        $salle->responsable = $request->responsable;

        // Sauvegarder les modifications
        $salle->save();

        // Rediriger ou retourner une réponse
        return redirect()->back()->with('success', 'Salle mise à jour avec succès.');
    }

    public function edit($id)
    {
        // Trouver la salle par ID
        $salle = Salle::find($id);
        $salles = Salle::orderBy('created_at', 'desc')->get();


        // Vérifier si la salle existe
        if (!$salle) {
            return redirect()->back()->with('error', 'Salle non trouvée.');
        }

        // Récupérer les types de salles pour le formulaire de modification
        $typesSalles = TypeSalle::all();

        // Afficher la vue de modification avec les données de la salle
        return view('admin.salle.salle_edit', compact('salle', 'salles', 'typesSalles'));
    }

    public function destroy($id)
    {
        // Trouver la salle par ID
        $salle = Salle::find($id);

        // Vérifier si la salle existe
        if (!$salle) {
            return redirect()->back()->with('error', 'Salle non trouvée.');
        }

        // Supprimer la salle
        $salle->delete();

        // Rediriger ou retourner une réponse
        return redirect()->back()->with('success', 'Salle supprimée avec succès.');
    }

}
