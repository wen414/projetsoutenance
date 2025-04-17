<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use HasFactory;

    protected $fillable = [
        'demande_id',
        'c_srhds_id',
        'statut',
    ];

    // Relation avec le modèle Demande
    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}
