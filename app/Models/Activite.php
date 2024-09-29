<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;

    // Spécifier la table associée
    protected $table = 'activites';

    // Les attributs qui peuvent être remplis
    protected $fillable = [
        'libelle_activite',
        'description',
        'id_type',
        'statut',
    ];
}
