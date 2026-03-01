<nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <a href="/" class="flex-shrink-0 flex items-center">
                    <span class="text-2xl font-extrabold text-indigo-600 tracking-tighter">CoLive.</span>
                </a>
                <div class="hidden md:ml-10 md:flex md:space-x-8">
                    <a href="#listings" class="text-gray-500 hover:text-indigo-600 px-1 py-2 text-sm font-semibold transition">Find a Room</a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600 px-1 py-2 text-sm font-semibold transition">How it Works</a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600 px-1 py-2 text-sm font-semibold transition">Community</a>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-indigo-600 px-3 py-2 text-sm font-bold transition">
                        Log in
                    </a>
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-sm font-bold rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 shadow-md shadow-indigo-100 transition">
                        Join Community
                    </a>
                @else
                    <a href="/dashboard" class="text-gray-600 hover:text-indigo-600 px-3 py-2 text-sm font-bold transition">
                        My Dashboard
                    </a>
                @endguest
            </div>
        </div>
    </div>
</nav>