<x-guest-layout>
    <x-dashboard-header />


        <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Bonjour, John! 👋</h2>
                    <p class="text-gray-500">Voici un aperçu de ta vie en communauté ce mois-ci.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 relative overflow-hidden">
                    <div class="relative z-10">
                        <p class="text-sm font-bold text-indigo-600 uppercase tracking-widest">Total Dépensé</p>
                        <p class="text-4xl font-black text-gray-900 mt-2">{{$depense_total}}</p>
                    </div>
                    <div class="absolute -right-4 -bottom-4 opacity-10 text-indigo-600 rotate-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-32 h-32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/><path d="M7 15h.01"/><path d="M11 15h2"/></svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-amber-100 relative overflow-hidden">
                    <div class="relative z-10">
                        <p class="text-sm font-bold text-amber-600 uppercase tracking-widest">Tes Dettes</p>
                        <p class="text-4xl font-black text-gray-900 mt-2">{{$dettes}}</p>
                    </div>
                    <div class="absolute -right-4 -bottom-4 opacity-10 text-amber-500 -rotate-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-32 h-32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/><path d="M16.5 3.5a10 10 0 0 1 4 4"/><path d="M3.5 16.5a10 10 0 0 1 4 4"/></svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-emerald-100 relative overflow-hidden">
                    <div class="relative z-10">
                        <p class="text-sm font-bold text-emerald-600 uppercase tracking-widest">On te doit</p>
                        <p class="text-4xl font-black text-gray-900 mt-2">{{$tedoit}}</p>
                    </div>
                    <div class="absolute -right-4 -bottom-4 opacity-10 text-emerald-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-32 h-32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
                    </div>
                </div>
            </div>

            <div id="profile-settings" class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-8 mb-8">
                <div class="flex items-center space-x-4 mb-8">
                    <div class="p-3 bg-indigo-50 text-indigo-600 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Paramètres du Profil</h3>
                </div>

                <form action="{{route('profile')}}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                    @csrf
                    <div class="lg:col-span-9 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 ml-1">Nom complet</label>
                            <input type="text" name="name" value="{{Auth::user()->name}}" class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 ml-1">Adresse Email</label>
                            <input type="email" name="email" value="{{Auth::user()->email}}" class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition">
                        </div>
                        <div class="md:col-span-2 flex justify-end">
                            <button type="submit" class="px-8 py-4 bg-indigo-600 text-white font-bold rounded-2xl shadow-lg shadow-indigo-100 hover:bg-indigo-700 hover:-translate-y-1 transition duration-200">
                                Enregistrer les modifications
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                </div>

        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            

            

            

            <div class="bg-indigo-900 rounded-[3rem] p-10 text-white relative overflow-hidden">
                <div class="relative z-10 flex flex-col md:flex-row justify-between items-center">
                    <div>
                        <h3 class="text-2xl font-bold mb-2">Historique des Colocs</h3>
                    </div>
                    <a href="{{route('colocations.index')}}" class="mt-6 md:mt-0 px-8 py-4 bg-white text-indigo-900 font-bold rounded-2xl hover:bg-indigo-50 transition">
                        Voir tout l'historique
                    </a>
                </div>
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-800 rounded-full opacity-50"></div>
            </div>

        </div>
    </div>
</x-guest-layout>
                        <script>
                            function previewImage(event) {
                                const reader = new FileReader();
                                reader.onload = function(){
                                    const output = document.getElementById('avatar-preview');
                                    output.src = reader.result;
                                };
                                reader.readAsDataURL(event.target.files[0]);
                            }
                        </script>
