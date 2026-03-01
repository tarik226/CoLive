<x-guest-layout>
    <x-dashboard-header />
@php
    $housemates = collect([
        (object)[
            'name' => 'Sarah Wilson',
            'reputation' => 3,
            'created_at' => now()->subMonths(14),
            'expenses_count' => 12,
        ],
        (object)[
            'name' => 'Alex Rivers',
            'reputation' => 1,
            'created_at' => now()->subMonths(8),
            'expenses_count' => 7,
        ],
        (object)[
            'name' => 'John Doe',
            'reputation' => 3,
            'created_at' => now()->subYears(2),
            'expenses_count' => 20,
        ],
        (object)[
            'name' => 'Maria Lopez',
            'reputation' => 2,
            'created_at' => now()->subMonths(5),
            'expenses_count' => 5,
        ],
        (object)[
            'name' => 'David Kim',
            'reputation' => 1,
            'created_at' => now()->subMonths(18),
            'expenses_count' => 15,
        ],
    ]);
@endphp

    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
                <div>
                    <h2 class="text-3xl font-black text-gray-900 tracking-tight">Ma Communauté</h2>
                    <p class="text-gray-500 mt-2 text-lg">Découvrez les membres de votre colocation actuelle.</p>
                </div>
                @if(Auth::user()->role == 'admin') 
                <form action="{{ route('colocations.destroy', $idcololc) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="mt-6 md:mt-0 px-6 py-3 bg-white border-2 border-indigo-600 text-indigo-600 font-bold rounded-2xl hover:bg-indigo-600 hover:text-white transition-all duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        Aboutire la colocation
                    </button>
                </form>
                @else
                <form action="{{ route('colocations.quitter') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="mt-6 md:mt-0 px-6 py-3 bg-white border-2 border-indigo-600 text-indigo-600 font-bold rounded-2xl hover:bg-indigo-600 hover:text-white transition-all duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        Quitter la colocation
                    </button>
                </form>
                @endif
                
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                
                @foreach($colocation->users as $mate)
                <div class="group bg-white rounded-[2.5rem] p-8 shadow-xl shadow-indigo-100/30 border border-transparent hover:border-indigo-100 transition-all duration-300 relative overflow-hidden">
                    
                    <div class="absolute top-6 right-6">
                        <div class="flex flex-col items-end">
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Reputation</span>
                            <div class="px-4 py-1.5 rounded-full bg-emerald-50 text-emerald-600 font-black text-sm border border-emerald-100 shadow-sm">
                                {{ $mate->reputation }}
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-center mt-4">
                        <div class="relative">
                            <img class="w-24 h-24 rounded-3xl object-cover shadow-lg group-hover:scale-105 transition-transform duration-300" 
                                src="https://ui-avatars.com/api/?name={{ urlencode($mate->name) }}&background=4f46e5&color=fff&size=128" 
                                alt="{{ $mate->name }}">
                            <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-md">
                                <span class="text-lg">✨</span>
                            </div>
                        </div>

                        <h3 class="mt-6 text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">
                            {{ $mate->name }}
                        </h3>
                        <p class="text-gray-400 text-sm font-medium">Membre depuis le {{ $mate->pivot->joined_at}}</p>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-50 flex justify-between items-center">
                        <div class="text-center flex-1 border-r border-gray-50">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-tighter">Dépenses</p>
                            <p class="font-bold text-gray-900">{{ $mate->depenses->sum('amount') ?? 0 }}</p>
                        </div>
                    </div>

                    <!-- Kick button (hidden until hover) -->
                    <a href="{{route('kick',$mate->id)}}">
                        <button class="absolute bottom-6 right-6 opacity-0 group-hover:opacity-100 bg-red-50 text-red-600 font-bold px-4 py-2 rounded-xl shadow-md hover:bg-red-100 transition-all duration-300">
                            Kick
                        </button>
                    </a>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</x-guest-layout>