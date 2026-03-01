<x-guest-layout>
    <x-dashboard-header />

    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="md:flex md:items-center md:justify-between mb-10">
                <div class="flex-1 min-w-0">
                    <h2 class="text-3xl font-bold leading-7 text-gray-900 sm:truncate">Your Living History</h2>
                    <p class="mt-1 text-sm text-gray-500">A look back at the communities you've been a part of.</p>
                </div>
                <div class="mt-4 flex md:mt-0 md:ml-4 gap-2">
                    @if($idcololc != null)
                        <button class="inline-flex items-center px-6 py-3 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 transition">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            <a href="{{route('colocations.show',$idcololc)}}">View Housemates</a>

                        </button>
                    @endif
                    <button class="inline-flex items-center px-6 py-3 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 transition">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                         <a href="{{route('colocations.create')}}">Create New Space</a>
                    </button>
                </div>
            </div>
            @php
                $pastHomes = [
                    [
                        'image' => 'https://picsum.photos/600/400?random=1',
                        'duration' => '3 months',
                        'name' => 'Sunny Loft',
                        'location' => 'Barcelona, Spain',
                        'roommates_count' => 4,
                        'is_owner' => true,
                        'is_active' => false
                    ],
                    [
                        'image' => 'https://picsum.photos/600/400?random=2',
                        'duration' => '6 weeks',
                        'name' => 'Cozy Flat',
                        'location' => 'Berlin, Germany',
                        'roommates_count' => 2,
                        'is_owner' => true,
                        'is_active' => false
                    ],
                    [
                        'image' => 'https://picsum.photos/600/400?random=3',
                        'duration' => '1 year',
                        'name' => 'Modern Studio',
                        'location' => 'Lisbon, Portugal',
                        'roommates_count' => 3,
                        'is_owner' => false,
                        'is_active' => false
                    ],
                    [
                        'image' => 'https://picsum.photos/600/400?random=4',
                        'duration' => '2 months',
                        'name' => 'Garden House',
                        'location' => 'Amsterdam, Netherlands',
                        'roommates_count' => 5,
                        'is_owner' => true,
                        'is_active' => true
                    ],
                ];
            @endphp

            @if(count($colocations) > 0)
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                   @foreach($colocations as $home)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                            <div class="h-48 w-full relative">
                                <img class="w-full h-full object-cover grayscale-[50%]" src="{{ asset('storage/'.$home->image) }}" alt="Home image">
                                
                                <!-- Duration + Active/Inactive dot -->
                                <div class="absolute top-4 right-4 flex items-center space-x-2">
                                    <span class="px-3 py-1 rounded-lg text-xs font-semibold bg-gray-900/70 text-white">
                                        {{ $home['duration'] }}
                                    </span>
                                    
                                    {{-- Find the current user's pivot status --}}
                                    @php
                                        $currentUserPivot = $home->users->firstWhere('id', Auth::id())?->pivot;
                                    @endphp
                                    
                                    @if($currentUserPivot && $currentUserPivot->status == 'active')
                                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    @else
                                        <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                    @endif
                                </div>
                            </div>

                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900">{{ $home['name'] }}</h3>
                                <p class="text-sm text-gray-500 mb-4">{{ $home['place'] }}</p>

                                <!-- Owner label - Check if current user is owner -->
                                @if($currentUserPivot && $currentUserPivot->type == 'owner')
                                    <span class="inline-block mb-2 px-3 py-1 text-xs font-bold text-indigo-600 bg-indigo-50 rounded-full">
                                        You are the Owner
                                    </span>
                                @endif

                                <div class="flex items-center text-sm text-indigo-600 font-semibold italic">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                    </svg>
                                    With {{ $home->users->count() }} Housemate(s)
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center bg-white rounded-3xl border-2 border-dashed border-gray-200 py-24 px-6">
                    <div class="mx-auto w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">No past homes yet</h3>
                    <p class="mt-2 text-gray-500 max-w-sm mx-auto">Your journey is just beginning! Once you finish a stay in a co-living space, it will appear here.</p>
                    <div class="mt-8">
                        <button class="text-indigo-600 font-bold hover:text-indigo-500 transition">
                            Explore active listings &rarr;
                        </button>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-guest-layout>