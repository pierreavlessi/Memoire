<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Salle;

class TypeSalle extends Model
{
    use HasFactory;
    protected $table = 'types_salles';

    protected $fillable = [
        'type',
    ];

    public function salles()
    {
        return $this->hasMany(Salle::class);
    }
}
