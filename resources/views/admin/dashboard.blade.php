<x-guest-layout>
    <x-dashboard-header />

    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-10 flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-black text-gray-900 tracking-tight">Console d'Administration</h2>
                    <p class="text-gray-500 mt-1 flex items-center">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2 animate-pulse"></span>
                        Système en ligne • {{ now()->format('d M Y') }}
                    </p>
                </div>
                <div class="flex space-x-3">
                    <button class="px-5 py-2.5 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 transition shadow-md shadow-indigo-100">Exporter Data</button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm relative overflow-hidden group">
                    <p class="text-xs font-black text-indigo-500 uppercase tracking-widest">Utilisateurs</p>
                    <p class="text-3xl font-black text-gray-900 mt-1">{{$users->count()}}</p>
                    <span class="text-xs text-emerald-500 font-bold">+12% ce mois</span>
                    <div class="absolute -right-2 -bottom-2 text-indigo-50 opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 015.25-2.094z"/></svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
                    <p class="text-xs font-black text-blue-500 uppercase tracking-widest">Colocations</p>
                    <p class="text-3xl font-black text-gray-900 mt-1">{{$colocation_count}}</p>
                    <span class="text-xs text-gray-400 font-medium">Actives partout au Maroc</span>
                </div>

                <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
                    <p class="text-xs font-black text-emerald-500 uppercase tracking-widest">Flux Financier</p>
                    <p class="text-3xl font-black text-gray-900 mt-1">{{$depenses_cost}} MAD</p>
                    <span class="text-xs text-emerald-500 font-bold">Volume mensuel</span>
                </div>

                <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
                    <p class="text-xs font-black text-amber-500 uppercase tracking-widest">Catégories</p>
                    <p class="text-3xl font-black text-gray-900 mt-1">{{$categorie_count}}</p>
                    <span class="text-xs text-gray-400 font-medium">Top: Alimentation</span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-8 border-b border-gray-50 flex items-center justify-between">
                            <h3 class="text-xl font-bold text-gray-900">Gestion des Utilisateurs</h3>
                            <div class="relative">
                                <input type="text" placeholder="Rechercher..." class="pl-10 pr-4 py-2 bg-gray-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 transition">
                                <svg class="w-4 h-4 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="bg-gray-50 text-[10px] font-black uppercase text-gray-400 tracking-[0.2em]">
                                    <tr>
                                        <th class="px-8 py-4">Utilisateur</th>
                                        <th class="px-6 py-4">Coloc</th>
                                        <th class="px-6 py-4">Réputation</th>
                                        <th class="px-6 py-4 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    @foreach($users as $user)
                                    <tr class="hover:bg-indigo-50/30 transition-colors group">
                                        <td class="px-8 py-5">
                                            <div class="flex items-center space-x-3">
                                                <div>
                                                    <p class="text-sm font-bold text-gray-900">{{ $user->name }}</p>
                                                    <p class="text-xs text-gray-400">{{ $user->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5 text-sm font-medium text-gray-600">{{ $user->activeColocation->first()->name }}</td>
                                        <td class="px-6 py-5">
                                            <span class="px-3 py-1 rounded-full text-xs font-black {{ $user->reputation > 1 ? 'bg-emerald-50 text-emerald-600' : 'bg-red-50 text-red-600' }}">
                                                {{ $user->reputation }} pts
                                            </span>
                                        </td>
                                        <td class="px-8 py-5 text-right space-x-2">
                                            <button onclick="openPopup('{{ $user->name }}', '{{ $user->email }}')" class="p-2 text-gray-400 hover:text-indigo-600 transition" title="Détails">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                            </button>
                                            @if($user->is_banned == 0)
                                            <a href="{{route('ban',$user->id)}}">
                                                <button class="p-2 text-gray-400 hover:text-red-600 transition" title="Bannir">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                                                </button>
                                            </a>
                                            @else
                                            <span class="text-[10px] font-black text-red-500 uppercase tracking-tighter">Banni</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="userPopup" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4"> <!-- Background overlay --> <div class="absolute inset-0 bg-black/50" onclick="closePopup()"></div> <!-- Modal --> <div class="relative bg-white w-full max-w-sm rounded-xl p-6 shadow-lg text-center z-10"> <button onclick="closePopup()" class="absolute top-3 right-3 text-gray-400 hover:text-black text-xl">&times;</button> <h3 id="popupName" class="text-xl font-bold text-gray-900"></h3> <p id="popupEmail" class="text-gray-500 mb-4"></p> <button onclick="closePopup()" class="w-full py-2 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition"> Fermer </button> </div> </div>

                <div class="space-y-8">
                    <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100">
                        <h3 class="text-lg font-black text-gray-900 mb-6 uppercase tracking-wider">Top Catégories (Global)</h3>
                        <div class="space-y-4">
                            @foreach([['n' => 'Alimentation', 'p' => 65], ['n' => 'Services / Bills', 'p' => 20], ['n' => 'Loisirs', 'p' => 15]] as $item)
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-bold text-gray-600">{{ $item['n'] }}</span>
                                <span class="text-sm font-black text-gray-900">{{ $item['p'] }}%</span>
                            </div>
                            <div class="w-full bg-gray-50 h-2 rounded-full">
                                <div class="bg-indigo-500 h-full rounded-full" style="width: {{ $item['p'] }}%"></div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-indigo-900 p-8 rounded-[2.5rem] text-white shadow-xl shadow-indigo-200">
                        <div class="flex items-center space-x-3 mb-6">
                            <span class="flex h-3 w-3 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-amber-500"></span>
                            </span>
                            <h3 class="text-lg font-bold">Alertes Système</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="p-4 bg-white/10 rounded-2xl border border-white/5">
                                <p class="text-xs font-bold text-indigo-200">Nouveau Signalement</p>
                                <p class="text-sm mt-1">Conflit financier dans la colocation "Appart Tanger".</p>
                            </div>
                            <div class="p-4 bg-white/10 rounded-2xl border border-white/5">
                                <p class="text-xs font-bold text-indigo-200">Update Requis</p>
                                <p class="text-sm mt-1">La base de données des devises arrive à expiration.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>


<script> 
    function openPopup(name, email) { 
        document.getElementById('popupName').textContent = name; 
        document.getElementById('popupEmail').textContent = email; 
        document.getElementById('userPopup').classList.remove('hidden'); 
    } 
    function closePopup() { 
        document.getElementById('userPopup').classList.add('hidden'); 
    } 
</script>