<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programmation extends Model
{
    use HasFactory;
    protected $table = 'programmations'; // Assurez-vous que le nom de la table est correct

    protected $fillable = [
        'id_prog',
        'id_salle',
        'id_util',
        'id_activite',
        'date',
        'heure_deb',
        'heure_fin',
        'statut',
        'description',
    ];

    public $timestamps = false; 
}
