<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;
use App\Models\Livres;
use App\Models\User;
use Illuminate\Http\Request;

class EmpruntController extends Controller
{
    /**
     * Afficher la liste de tous les emprunts.
     */
    public function index()
    {
        // On récupère les emprunts avec leurs relations pour éviter les requêtes superflues (Eager Loading)
        $emprunts = Emprunt::with(['livre', 'user'])->latest()->get();

        return view('emprunts.index', compact('emprunts'));
    }

    /**
     * Afficher le formulaire de création d'un emprunt.
     */
    public function create()
    {
        // On récupère les livres et les utilisateurs pour alimenter les listes déroulantes du formulaire
        $livres = Livres::all();
        $users = User::all();

        return view('emprunts.create', compact('livres', 'users'));
    }

    /**
     * Enregistrer un nouvel emprunt dans la base de données.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'livre_id' => 'required|exists:livres,id',
            'user_id' => 'required|exists:users,id',
            'date_emprunt' => 'required|date',
            'date_restitution_prevue' => 'required|date|after_or_equal:date_emprunt',
        ]);

        // Création de l'emprunt
        Emprunt::create([
            'livre_id' => $request->livre_id,
            'user_id' => $request->user_id,
            'date_emprunt' => $request->date_emprunt,
            'date_restitution_prevue' => $request->date_restitution_prevue,
            'date_restitution_effective' => null, // Vide au départ
        ]);

        return redirect()->route('emprunts.index')->with('success', 'L\'emprunt a été enregistré avec succès !');
    }

    /**
     * Enregistrer la date de retour effective quand le livre est rendu.
     * (Géré par Dev 1)
     */
    public function marquerCommeRendu(Emprunt $emprunt)
    {
        $emprunt->update([
            'date_restitution_effective' => now()->toDateString()
        ]);

        return redirect()->route('emprunts.index')->with('success', 'Le livre a bien été restitué.');
    }
}
