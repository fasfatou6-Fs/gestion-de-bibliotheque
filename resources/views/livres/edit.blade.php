<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-900 leading-tight">
            {{ __('➕ Nouvel Ouvrage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-8 border-t-4 border-rose-500">

                <form action="{{ route('livres.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Titre de l'ouvrage</label>
                        <input type="text" name="titre" class="w-full border-purple-200 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Auteur</label>
                        <input type="text" name="auteur" class="w-full border-purple-200 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm" required>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Année de publication</label>
                            <input type="number" name="annee" min="1000" max="{{ date('Y') }}" class="w-full border-purple-200 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Quantité initiale</label>
                            <input type="number" name="quantite_disponible" min="0" class="w-full border-purple-200 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Résumé (Optionnel)</label>
                        <textarea name="description" rows="4" class="w-full border-purple-200 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm"></textarea>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4 border-t border-purple-50">
                        <a href="{{ route('livres.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-200 hover:bg-slate-300 rounded-md font-semibold text-xs text-slate-700 uppercase tracking-widest transition">
                            Annuler
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-xs font-bold uppercase tracking-widest rounded-md shadow transition">
                            Enregistrer
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
