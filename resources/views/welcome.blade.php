<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGBLE - Système de Gestion de Bibliothèque</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-pink-100 font-sans antialiased min-h-screen flex flex-col justify-between">

    <nav class="bg-slate-900/95 backdrop-blur-md shadow-lg border-b border-slate-800 relative z-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center space-x-3 group cursor-pointer">
                    <div class="bg-gradient-to-tr from-purple-600 to-rose-500 p-2.5 rounded-xl shadow-md transition-transform group-hover:scale-105">
                        <span class="text-xl text-white block leading-none">📚</span>
                    </div>
                    <span class="text-2xl font-black text-white tracking-tight">SG<span class="text-rose-400">BLE</span></span>
                </div>

                <div class="flex items-center space-x-6">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('livres.index') }}" class="text-sm font-semibold text-slate-300 hover:text-rose-400 transition">Tableau de bord</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-300 hover:text-rose-400 transition">Se connecter</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-lg transition transform hover:-translate-y-0.5">
                                    Créer un compte
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 py-16 lg:py-24 my-auto w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">

            <div class="space-y-6 lg:col-span-7 text-center lg:text-left">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-bold bg-white/80 border border-pink-200 text-rose-700 uppercase tracking-widest shadow-sm backdrop-blur-sm">
                    <span class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></span>
                    Portail Universitaire Académique
                </span>

                <h1 class="text-4xl sm:text-6xl font-black text-slate-900 tracking-tight leading-none">
                    Gestion de Bibliothèque <br class="hidden sm:inline">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 via-indigo-600 to-rose-500">
                        & Restitutions
                    </span>
                </h1>

                <p class="text-base sm:text-xl text-slate-700 max-w-xl mx-auto lg:mx-0 font-medium leading-relaxed">
                    Une plateforme d'ingénierie logicielle épurée pour le suivi du catalogue, l'automatisation des flux d'emprunts et la traçabilité des stocks.
                </p>

                <div class="pt-4 flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                    @auth
                        <a href="{{ route('livres.index') }}" class="inline-flex justify-center items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-rose-500 hover:from-purple-700 hover:to-rose-600 text-white font-bold rounded-xl shadow-xl transition transform hover:-translate-y-0.5 min-w-[200px]">
                            Accéder au Catalogue ⚡
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex justify-center items-center px-8 py-4 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-xl shadow-xl transition transform hover:-translate-y-0.5 min-w-[200px]">
                            Ouvrir une session
                        </a>
                        <a href="{{ route('register') }}" class="inline-flex justify-center items-center px-8 py-4 bg-white/90 backdrop-blur-sm hover:bg-white text-purple-700 font-bold rounded-xl shadow-md border border-pink-200 transition min-w-[200px]">
                            S'inscrire à la plateforme
                        </a>
                    @endauth
                </div>
            </div>

            <div class="lg:col-span-5 flex justify-center lg:justify-end">
                <div class="w-full max-w-md bg-gradient-to-br from-slate-950 via-slate-900 to-indigo-950 border border-slate-800 rounded-3xl p-8 shadow-2xl relative overflow-hidden group hover:shadow-purple-500/10 transition-all duration-300">
                    <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-purple-500 via-indigo-500 to-rose-500"></div>

                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-widest text-purple-400">Architecture & Données</p>
                            <h3 class="text-2xl font-bold text-white mt-1 tracking-tight">Statut d'exécution</h3>
                        </div>
                        <div class="flex items-center gap-2 bg-emerald-500/10 border border-emerald-500/30 px-3 py-1 rounded-full">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                            <span class="text-[10px] font-bold uppercase text-emerald-400 tracking-wider">Online</span>
                        </div>
                    </div>

                    <div class="space-y-4 font-mono text-sm border-t border-slate-800/80 pt-6">
                        <div class="flex items-center justify-between text-slate-400">
                            <span class="flex items-center gap-2">📂 Core Backend :</span>
                            <span class="text-white font-medium">Laravel 11</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-400">
                            <span class="flex items-center gap-2">🗄️ Relational DB :</span>
                            <span class="text-rose-400 font-bold">MySQL (Laragon)</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-400">
                            <span class="flex items-center gap-2">🔒 Sécurité Accès :</span>
                            <span class="text-indigo-400 font-medium">RBAC Gate/Policy</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-400">
                            <span class="flex items-center gap-2">🛠️ Design CSS :</span>
                            <span class="text-purple-400 font-medium">Tailwind CSS</span>
                        </div>
                    </div>

                    <div class="mt-8 pt-4 border-t border-slate-800/50 flex justify-between items-center text-[11px] text-slate-500 font-mono">
                        <span>Version v1.0.2</span>
                        <span>SGBLE Project</span>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="w-full text-center py-6 text-xs font-medium text-slate-500 relative z-10">
        &copy; 2026 SGBLE — TP DevOps. Tous droits réservés.
    </footer>

</body>
</html>
