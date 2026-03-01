<x-guest-layout>
    <x-dashboard-header />
@php
    // Dummy expenses
    $expenses = [
        [
            'payeur' => 'Sarah Wilson',
            'initials' => 'SW',
            'categorie' => 'Alimentation',
            'date' => '23 Fév 2026',
            'montant' => 45.50,
        ],
        [
            'payeur' => 'Alex Rivers',
            'initials' => 'AR',
            'categorie' => 'Transport',
            'date' => '20 Fév 2026',
            'montant' => 18.00,
        ],
        [
            'payeur' => 'Moi (John Doe)',
            'initials' => 'JD',
            'categorie' => 'Internet',
            'date' => '15 Fév 2026',
            'montant' => 60.00,
        ],
        [
            'payeur' => 'Sarah Wilson',
            'initials' => 'SW',
            'categorie' => 'Ménage',
            'date' => '10 Fév 2026',
            'montant' => 30.25,
        ],
        [
            'payeur' => 'Alex Rivers',
            'initials' => 'AR',
            'categorie' => 'Loisirs',
            'date' => '05 Fév 2026',
            'montant' => 75.00,
        ],
    ];
@endphp
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col lg:flex-row gap-8">
                
                <div class="w-full lg:w-1/3 space-y-8">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 ">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-gray-900">Catégories</h3>
                            <button onclick="toggleModal('category-modal')" class="p-2 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-100 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            </button>
                        </div>
                        <div id="category-modal" class="hidden fixed inset-0 z-[60] overflow-y-auto">
                            <div class="flex items-center justify-center min-h-screen px-4">
                                <div class="fixed inset-0 bg-gray-900 opacity-50" onclick="toggleModal('category-modal')"></div>
                                
                                <div class="relative bg-white rounded-[2.5rem] max-w-sm w-full p-8 shadow-2xl">
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Nouvelle Catégorie</h3>
                                    <form action="{{route('categories.store')}}" method="POST">
                                        @csrf
                                        <div class="mb-6">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nom de la catégorie</label>
                                            <input type="text" name="name" placeholder="Ex: Internet, Ménage..." class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-indigo-500">
                                        </div>
                                        <div class="flex gap-3">
                                            <button type="button" onclick="toggleModal('category-modal')" class="flex-1 px-4 py-3 bg-gray-100 text-gray-600 font-bold rounded-xl">Annuler</button>
                                            <button type="submit" class="flex-1 px-4 py-3 bg-indigo-600 text-white font-bold rounded-xl shadow-lg shadow-indigo-100">Créer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-3">
                            @if($categories->count()>0)
                                @foreach($categories as $category)
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl group transition hover:bg-white hover:shadow-md border border-transparent hover:border-indigo-100">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 rounded-full bg-indigo-500"></div>
                                        <span class="font-semibold text-gray-700">{{ $category->name }}</span>
                                    </div>
                                    <form action="{{route('categories.destroy',$category->id)}}" method="POST" class="opacity-0 group-hover:opacity-100 transition">
                                        @csrf @method('DELETE')
                                        <button class="text-red-400 hover:text-red-600">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl shadow-sm border border-amber-100 p-6 bg-gradient-to-b from-white to-amber-50/30">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-bold text-gray-900">À rembourser</h3>
                            <span class="px-2 py-1 bg-amber-100 text-amber-700 text-[10px] font-black uppercase rounded-lg">Action requise</span>
                        </div>
                        @if($a_rembourser->count()>0)
                            @foreach($a_rembourser as $debtor)
                                <div class="space-y-4" data-value='{{$debtor["user"]}}'>
                                    <div class="p-4 bg-white rounded-2xl border border-gray-100 shadow-sm">
                                        <div class="flex items-center justify-between mb-3">
                                            <div class="flex items-center space-x-3">
                                                <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name={{$debtor['user_name']}}+W&background=4f46e5&color=fff" alt="">
                                                <span class="text-sm font-bold text-gray-700">{{$debtor['user_name']}}</span>
                                            </div>
                                            <span class="text-lg font-black text-amber-600">{{$debtor['amount_depense']}} MAD</span>
                                        </div>
                                        <button class="w-full py-2 bg-indigo-600 text-white text-xs font-bold rounded-lg hover:bg-indigo-700 transition">
                                            <a href="{{route('part',$debtor['id_settlement'])}}">Régler ma part</a>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="w-full lg:w-2/3 space-y-8">
                    
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">Ajouter une Dépense</h3>
                        
                        <form action="{{route('depenses.store')}}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @csrf

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
                                <input type="text" name="title" class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Montant ($)</label>
                                <input type="number" name="amount" step="5" placeholder="0.00" class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Catégorie</label>
                                <select name="category_id" class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-indigo-500">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                             <div>
                                <input type="hidden" name="colocation_id" value="{{$colocation_id}}">
                            </div>

                            <div>
                                <input type="hidden" name="user" value="{{$user}}">
                            </div>


                            <div class="md:col-span-2">
                                <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-4 rounded-xl shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">
                                    Enregistrer la dépense
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                                <tr>
                                    
                                    <th class="px-6 py-4 font-bold">Catégorie</th>
                                    <th class="px-6 py-4 font-bold">Title</th>
                                    <th class="px-6 py-4 font-bold">Date</th>
                                    <th class="px-6 py-4 font-bold text-right">Montant</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                               
                                @foreach($depenses as $depense)
                                    <tr  class="hover:bg-indigo-50/30 transition">
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $depense->category->name ?? '' }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $depense->title }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $depense->created_at }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500 text-gray-900 text-right">{{ $depense->amount }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    

    <script>
        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
        }
    </script>
</x-guest-layout>