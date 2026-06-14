<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livres extends Model
{
    use HasFactory;

    
    protected $table = 'livres';

    protected $fillable = [
        'titre',
        'auteur',
        'annee',
        'description',
        'quantite_disponible'
    ];
}
