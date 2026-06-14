<?php

namespace App\Http\Controllers;
use App\http\Controllers\Controller;
use App\Models\Livres; // Import du modèle francisé
use Illuminate\Http\Request;

class LivresController extends Controller
{
    public function index() {
        $livres = Livres::paginate(10);
        return view('livres.index', compact('livres')); // Dossier resources/views/livres/
    }

    public function create() {
        return view('livres.create');
    }

    public function store(Request $request) {
      $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'auteur' => 'required|string|max:255',
        'categorie' => 'required|string',
        'annee' => 'required|integer|min:1000|max:' . (date('Y') + 1),
        'isbn' => 'nullable|string',
        'quantite_disponible' => 'required|integer|min:0',
        ]);

        Livres::create($request->all());

        return redirect()->route('livres.index')->with('success', 'Livre ajouté avec succès !');
    }

    public function edit($id) {
        $livre = Livres::findOrFail($id);
        return view('livres.edit', compact('livre'));
    }

    public function update(Request $request, $id) {
        $livre = Livres::findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'annee' => 'required|integer|min:1000|max:' . date('Y'),
            'quantite_disponible' => 'required|integer|min:0',
        ]);

        $livre->update($request->all());

        return redirect()->route('livres.index')->with('success', 'Livre mis à jour !');
    }

    public function destroy($id) {
        $livre = Livres::findOrFail($id);
        $livre->delete();

        return redirect()->route('livres.index')->with('success', 'Livre supprimé du catalogue.');
    }
}
