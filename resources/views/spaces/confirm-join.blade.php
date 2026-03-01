<x-guest-layout>
    

    <div class="min-h-screen bg-gray-50 py-12 px-4 flex items-center justify-center">
        <div class="max-w-md w-full">
            
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-indigo-600 text-white rounded-[2rem] shadow-xl shadow-indigo-200 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                </div>
                <h2 class="text-3xl font-black text-gray-900 tracking-tight">Vérification</h2>
                <p class="text-gray-500 mt-2">Identifiez votre colocation pour finaliser l'accès.</p>
            </div>

            <div class="bg-white rounded-[3rem] shadow-2xl shadow-indigo-100/50 border border-white p-8 md:p-10">
                <form action="{{route('enroll')}}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="space-y-3">
                        <label class="block text-center text-[10px] font-black text-indigo-600 uppercase tracking-[0.3em]">
                            Code d'invitation (Email)
                        </label>
                        <input type="text" name="join_code" maxlength="6" placeholder="000000" required
                               class="w-full text-center text-3xl font-black tracking-[0.4em] py-5 bg-gray-50 border-none rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:bg-white transition-all duration-300 placeholder:opacity-20 uppercase">
                    </div>

                    <div class="space-y-3 pt-2">
                        <label class="block text-center text-[10px] font-black text-gray-400 uppercase tracking-[0.3em]">
                            ID de la Colocation
                        </label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-5 flex items-center text-gray-400 group-focus-within:text-indigo-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
                                </svg>
                            </span>
                            <input type="text" name="house_id" placeholder="Ex: #CASA-2024" required
                                   class="w-full pl-14 pr-6 py-4 bg-gray-50 border-none rounded-2xl text-gray-900 font-bold text-sm focus:ring-2 focus:ring-indigo-500/20 focus:bg-white transition-all">
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" 
                            class="w-full py-5 bg-indigo-600 text-white font-black rounded-2xl shadow-xl shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 active:scale-[0.98] transition-all duration-300 uppercase tracking-widest text-xs">
                            Rejoindre l'Espace
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-xs text-gray-400">
                        Problème d'identification ? 
                        <a href="#" class="text-indigo-600 font-bold hover:underline">Contacter l'admin</a>
                    </p>
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="{{route('dashboard')}}" class="text-sm font-bold text-gray-400 hover:text-indigo-600 transition">
                    Annuler
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>