<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function create()
    {
 
    
        return view('admin.utilisateur.utilisateur');
       }
 
       public function index()
       {
         //
         //$Profils = Profil::latest()->get();
         $utilisateur = Utilisateur::all();
         return view("admin.utilisateur.index", compact("utilisateur"));
       }
       public function save(Request $request)
       {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'mot_pass' => 'required|string|min:8',
            'role' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'tel' => 'nullable|string|max:15',
            'type' => 'required|string',
        ]);
        Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'mot_pass' => bcrypt($request->mot_pass), // Sécurise le mot de passe
            'role' => $request->role,
            'email' => $request->email,
            'tel' => $request->tel,
            'type' => $request->type,
        ]);
 
}
public function update(Request $request, $id)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'mot_pass' => 'nullable|string|min:8',
        'role' => 'required|string',
        'email' => 'required|email|unique:users,email,' . $id,
        'tel' => 'nullable|string|max:15',
        'type' => 'required|string',
    ]);

    $utilisateur = Utilisateur::findOrFail($id);
    $utilisateur->nom = $request->nom;
    $utilisateur->prenom = $request->prenom;
    $utilisateur->role = $request->role;
    $utilisateur->email = $request->email;
    $utilisateur->tel = $request->tel;
    $utilisateur->type = $request->type;

    if ($request->filled('mot_pass')) {
        $utilisateur->mot_pass = bcrypt($request->mot_pass);
    }

    $utilisateur->save();

    return redirect()->route('admin.utilisateur.index')->with('success', 'Utilisateur mis à jour avec succès.');
}


}