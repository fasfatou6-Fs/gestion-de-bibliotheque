<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-900 leading-tight flex justify-between items-center">
            {{ __('📚 Ajouter un Nouvel Ouvrage') }}
            <a href="{{ route('livres.index') }}" class="inline-flex items-center text-xs font-bold text-purple-700 hover:text-purple-900 bg-purple-50 hover:bg-purple-100 px-3 py-2 rounded-lg border border-purple-200 transition shadow-sm">
                ⬅️ Retour au Catalogue
            </a>
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50/50 min-h-[calc(100vh-65px)]">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white border-y border-r border-slate-200/80 rounded-r-2xl shadow-[0_10px_25px_-5px_rgba(0,0,0,0.05)] overflow-hidden relative min-h-[500px]">

                <div class="absolute top-0 left-0 w-4 h-full bg-gradient-to-r from-purple-800 via-purple-600 to-purple-700 shadow-[inset_-2px_0_4px_rgba(0,0,0,0.2)] z-20"></div>
                <div class="absolute top-0 left-4 w-1 h-full bg-slate-100 z-10"></div>

                <div class="p-8 sm:p-10 pl-10 sm:pl-12 relative z-0">

                    <div class="mb-8 border-b border-slate-100 pb-4">
                        <p class="text-sm font-medium text-slate-500">
                            Renseignez les métadonnées et la disponibilité physique du livre pour l'enregistrer dans l'inventaire de la bibliothèque.
                        </p>
                    </div>

                    <form action="{{ route('livres.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-1.5">
                                <label for="titre" class="block text-xs font-black uppercase tracking-wider text-slate-700">Titre de l'ouvrage <span class="text-rose-500">*</span></label>
                                <input type="text" name="titre" id="titre" value="{{ old('titre') }}" placeholder="Ex: Le Petit Prince" required
                                    class="w-full text-sm px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:ring-2 focus:ring-purple-500/20 focus:border-purple-600 transition duration-200 @error('titre') border-rose-400 bg-rose-50/30 @enderror">
                                @error('titre')
                                    <p class="text-xs font-semibold text-rose-600 mt-1">⚠️ {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-1.5">
                                <label for="auteur" class="block text-xs font-black uppercase tracking-wider text-slate-700">Auteur <span class="text-rose-500">*</span></label>
                                <input type="text" name="auteur" id="auteur" value="{{ old('auteur') }}" placeholder="Ex: Antoine de Saint-Exupéry" required
                                    class="w-full text-sm px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:ring-2 focus:ring-purple-500/20 focus:border-purple-600 transition duration-200 @error('auteur') border-rose-400 bg-rose-50/30 @enderror">
                                @error('auteur')
                                    <p class="text-xs font-semibold text-rose-600 mt-1">⚠️ {{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-1.5">
                                <label for="categorie" class="block text-xs font-black uppercase tracking-wider text-slate-700">Catégorie / Genre <span class="text-rose-500">*</span></label>
                                <select name="categorie" id="categorie" required
                                    class="w-full text-sm px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:bg-white focus:ring-2 focus:ring-purple-500/20 focus:border-purple-600 transition duration-200 @error('categorie') border-rose-400 bg-rose-50/30 @enderror">
                                    <option value="" disabled {{ old('categorie') ? '' : 'selected' }}>Choisir une catégorie...</option>
                                    <option value="Informatique" {{ old('categorie') == 'Informatique' ? 'selected' : '' }}>💻 Informatique / Dev</option>
                                    <option value="Roman" {{ old('categorie') == 'Roman' ? 'selected' : '' }}>📖 Roman / Littérature</option>
                                    <option value="Sciences" {{ old('categorie') == 'Sciences' ? 'selected' : '' }}>🔬 Sciences / Robotique</option>
                                    <option value="Histoire" {{ old('categorie') == 'Histoire' ? 'selected' : '' }}>🏛️ Histoire / Géographie</option>
                                    <option value="Management" {{ old('categorie') == 'Management' ? 'selected' : '' }}>📊 Management / Gestion</option>
                                </select>
                                @error('categorie')
                                    <p class="text-xs font-semibold text-rose-600 mt-1">⚠️ {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-1.5">
                                <label for="annee" class="block text-xs font-black uppercase tracking-wider text-slate-700">Année de Publication <span class="text-rose-500">*</span></label>
                                <input type="number" name="annee" id="annee" value="{{ old('annee', date('Y')) }}" min="1000" max="{{ date('Y') + 1 }}" required
                                    class="w-full text-sm px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:ring-2 focus:ring-purple-500/20 focus:border-purple-600 transition duration-200 @error('annee') border-rose-400 bg-rose-50/30 @enderror">
                                @error('annee')
                                    <p class="text-xs font-semibold text-rose-600 mt-1">⚠️ {{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-1.5">
                                <label for="isbn" class="block text-xs font-black uppercase tracking-wider text-slate-700">Code ISBN <span class="text-slate-400 font-normal">(Optionnel)</span></label>
                                <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}" placeholder="Ex: 9782070612758"
                                    class="w-full text-sm font-mono px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:ring-2 focus:ring-purple-500/20 focus:border-purple-600 transition duration-200 @error('isbn') border-rose-400 bg-rose-50/30 @enderror">
                                @error('isbn')
                                    <p class="text-xs font-semibold text-rose-600 mt-1">⚠️ {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-1.5">
                                <label for="quantite_disponible" class="block text-xs font-black uppercase tracking-wider text-slate-700">Exemplaires Disponibles <span class="text-rose-500">*</span></label>
                                <input type="number" name="quantite_disponible" id="quantite_disponible" value="{{ old('quantite_disponible', 1) }}" min="0" max="500" required
                                    class="w-full text-sm px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:ring-2 focus:ring-purple-500/20 focus:border-purple-600 transition duration-200 @error('quantite_disponible') border-rose-400 bg-rose-50/30 @enderror">
                                @error('quantite_disponible')
                                    <p class="text-xs font-semibold text-rose-600 mt-1">⚠️ {{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                            <a href="{{ route('livres.index') }}" class="px-5 py-2.5 text-xs font-bold text-slate-500 hover:text-slate-700 bg-slate-100 hover:bg-slate-200/80 rounded-xl transition duration-200">
                                Annuler
                            </a>
                            <button type="submit" class="px-6 py-2.5 text-xs font-bold text-white bg-gradient-to-r from-rose-500 to-pink-600 hover:from-rose-600 hover:to-pink-700 rounded-xl shadow-[0_4px_12px_rgba(244,63,94,0.2)] hover:shadow-[0_4px_16px_rgba(244,63,94,0.3)] transform hover:-translate-y-0.5 transition duration-200">
                                ✨ Enregistrer le Livre
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
