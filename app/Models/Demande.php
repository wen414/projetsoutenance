<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'filiere',
        'niveau',
        'diplome',
        'type_stage',
        'statut_stage',
        'date_debut',
        'date_fin',
        'contact',
        'pdf_path',
    ];

    public function affectation()
    {
        return $this->hasOne(Affectation::class);
    }
}
