<nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="text-xl font-bold text-indigo-600 tracking-tighter">CoLive.</a>
                <div class="hidden md:ml-8 md:flex md:space-x-6">
                    <a href="{{route('dashboard')}}" class="text-gray-500 border-b-2 hover:text-indigo-600 text-sm h-16 flex items-center font-semibold">Dashboard</a>
                    <a href="{{route('colocations.index')}}" class="text-indigo-600 border-b-2 border-indigo-600 text-sm font-bold h-16 flex items-center">Past Homes</a>
                    <a href="{{route('expense.index')}}" class="text-gray-500  border-b-2 hover:text-indigo-600 text-sm h-16 flex items-center font-semibold">Dépenses</a>
                </div>
            </div>
            
            <div class="flex items-center space-x-4">
               <form method="POST" action="{{ route('logout') }}" class="inline">
    @csrf
    <button type="submit" class="p-2 text-gray-400 hover:text-indigo-600 transition">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
    </button>
</form>
                <div class="h-10 w-10 rounded-full bg-indigo-100 border-2 border-indigo-600 flex items-center justify-center text-indigo-700 font-bold cursor-pointer">
                    <a href="{{route('dashboard')}}">JD</a>
                </div>
            </div>
        </div>
    </div>
</nav>