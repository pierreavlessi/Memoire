<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salle extends Model
{
    use HasFactory;

    // La table associée au modèle.
    protected $table = 'salles';

    // Les attributs qui sont mass assignable.
    protected $fillable = [
        'libelle',
        'capacite',
        'equipement',
        'disponibilite',
        'type_salle_id',
        'batiment',
        'responsable',
    ];

    // Les attributs qui devraient être cachés pour les tableaux.
    protected $hidden = [];

    // Les attributs qui devraient être castés en types natifs.
    protected $casts = [
        'disponibilite' => 'boolean',
    ];
}
