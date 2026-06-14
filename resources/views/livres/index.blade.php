<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-900 leading-tight flex justify-between items-center">
            {{ __('📚 Catalogue de la Bibliothèque') }}

            @auth
                <a href="{{ route('livres.create') }}" class="bg-rose-500 hover:bg-rose-600 text-white text-sm font-bold px-4 py-2 rounded-md shadow transition">
                    + Ajouter un livre
                </a>
            @else
                <a href="{{ route('login') }}" class="bg-purple-600 hover:bg-purple-700 text-white text-xs sm:text-sm font-bold px-4 py-2 rounded-md shadow transition flex items-center gap-1">
                    🔑 Se connecter
                </a>
            @endauth
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-rose-200 border-l-4 border-rose-600 text-rose-900 p-4 mb-6 rounded-xl shadow-sm font-bold">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse($livres as $livre)
                    <div class="bg-white border-y border-r border-pink-200 rounded-r-xl shadow-[5px_5px_15px_rgba(0,0,0,0.08)] hover:shadow-[8px_8px_20px_rgba(244,63,94,0.15)] transition-all duration-300 flex flex-col justify-between overflow-hidden relative group min-h-[280px]">

                        <div class="absolute top-0 left-0 w-4 h-full bg-gradient-to-r from-purple-800 via-purple-600 to-purple-700 shadow-[inset_-2px_0_4px_rgba(0,0,0,0.2)] z-20"></div>

                        <div class="absolute top-0 left-4 w-1 h-full bg-slate-200/50 z-10"></div>

                        <div class="absolute -bottom-2 -right-4 text-7xl select-none pointer-events-none text-rose-500/10 font-sans transform group-hover:scale-110 group-hover:-rotate-12 transition-transform duration-300 z-0">
                            📖
                        </div>

                        <div class="absolute top-3 right-3 z-10">
                            @if($livre->quantite_disponible > 0)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-purple-50 text-purple-800 border border-purple-100">
                                    📖 {{ $livre->quantite_disponible }} dispo(s)
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-rose-50 text-rose-800 border border-rose-100">
                                    ⚠️ Épuisé
                                </span>
                            @endif
                        </div>

                        <div class="p-5 pt-12 pl-8 space-y-4 relative z-10">
                            <span class="text-[9px] font-bold uppercase tracking-wider text-purple-700 bg-pink-100/60 border border-pink-200 px-2 py-0.5 rounded">
                                {{ $livre->categorie ?? 'Ouvrage' }}
                            </span>

                            <div class="space-y-1">
                                <h3 class="text-base font-black text-slate-900 line-clamp-2 leading-tight group-hover:text-purple-700 transition-colors" title="{{ $livre->titre }}">
                                    {{ $livre->titre }}
                                </h3>
                                <p class="text-xs font-medium text-slate-500 italic">
                                    par <span class="text-slate-700 font-semibold not-italic">{{ $livre->auteur }}</span>
                                </p>
                            </div>

                            <div class="border-b border-slate-100 pt-2"></div>

                            <div class="grid grid-cols-2 gap-2 text-[11px] font-mono text-slate-400 bg-slate-50/50 p-2 rounded-lg border border-slate-100">
                                <div>
                                    <span class="block text-[8px] font-sans uppercase tracking-wider text-slate-400 font-bold">Année</span>
                                    <span class="text-slate-700 font-bold">{{ $livre->annee }}</span>
                                </div>
                                <div class="text-right">
                                    <span class="block text-[8px] font-sans uppercase tracking-wider text-slate-400 font-bold">Code ISBN</span>
                                    <span class="text-slate-700 font-medium">{{ $livre->isbn ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>

                        @auth
                            <div class="bg-slate-50/80 border-t border-slate-100 p-3 pl-8 flex items-center justify-between gap-2 relative z-10">
                                <a href="{{ route('livres.edit', $livre->id) }}" class="flex-1 inline-flex justify-center items-center px-3 py-1.5 bg-white border border-slate-200 hover:border-purple-400 text-slate-700 hover:text-purple-700 text-xs font-bold rounded-lg shadow-sm transition">
                                    ✏️ Modifier
                                </a>

                                <form action="{{ route('livres.destroy', $livre->id) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ce livre ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex justify-center items-center p-1.5 bg-white border border-rose-200 hover:border-rose-400 text-rose-600 hover:bg-rose-50 text-xs font-bold rounded-lg shadow-sm transition" title="Supprimer le livre">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="bg-slate-50/60 border-t border-slate-100 p-3 pl-8 text-center relative z-10">
                                <span class="text-[11px] text-slate-400 font-medium">Connexion requise pour modifier</span>
                            </div>
                        @endauth

                    </div>
                @empty
                    <div class="col-span-full p-12 text-center bg-white border border-dashed border-slate-300 rounded-2xl">
                        <div class="flex flex-col items-center justify-center space-y-2">
                            <span class="text-4xl">📁</span>
                            <p class="text-lg font-extrabold text-slate-900">Le catalogue est vide</p>
                            <p class="text-sm text-slate-700 font-medium">Ajoute un premier ouvrage pour le voir apparaître ici.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="mt-8 max-w-full overflow-hidden text-xs text-slate-700 pagination-sm">
                {{ $livres->links('pagination::tailwind') }}
            </div>

        </div>
    </div>
</x-app-layout>

<style>
    /* Nettoyage des SVGs disproportionnés de la pagination par défaut de Tailwind */
    .pagination-sm svg {
        display: inline-block !important;
        width: 16px !important;
        height: 16px !important;
    }
    .pagination-sm nav div:first-child {
        display: none !important; /* Masque la description textuelle sur mobile */
    }
</style>
