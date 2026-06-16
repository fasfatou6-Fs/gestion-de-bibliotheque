<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    use HasFactory;

    // Optionnel : Pour autoriser l'assignation de masse sur ces champs
    protected $fillable = [
        'livre_id',
        'user_id',
        'date_emprunt',
        'date_restitution_prevue',
        'date_restitution_effective',
    ];



    /**
     * Récupérer le livre associé à cet emprunt.
     */
    public function livre()
    {
        return $this->belongsTo(Livres::class, 'livre_id');
    }

    /**
     * Récupérer l'utilisateur (lecteur) qui a fait cet emprunt.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

