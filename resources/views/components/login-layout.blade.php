<x-guest-layout>
    <div class="flex min-h-screen bg-white">
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-16">
            <div class="max-w-md w-full">
                <div class="mb-10 lg:mb-12">
                    <h1 class="text-3xl font-extrabold text-indigo-600 tracking-tight">CoLive.</h1>
                    <h2 class="mt-6 text-2xl font-bold text-gray-900">Welcome back!</h2>
                    <p class="mt-2 text-gray-500">Sign in to catch up with your housemates.</p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Email Address</label>
                        <input type="email" name="email" placeholder="name@example.com" required 
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white transition duration-200">
                    </div>

                    <div>
                        <div class="flex justify-between">
                            <label class="block text-sm font-semibold text-gray-700">Password</label>
                        </div>
                        <input type="password" name="password" placeholder="••••••••" required 
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white transition duration-200">
                    </div>

                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <label for="remember" class="text-sm text-gray-500">Keep me logged in</label>
                    </div>

                    <button type="submit" 
                        class="w-full py-4 px-6 text-white bg-indigo-600 hover:bg-indigo-700 font-bold rounded-xl shadow-lg shadow-indigo-200 transition-all transform active:scale-[0.98]">
                        Enter the House
                    </button>
                </form>

                <p class="mt-8 text-center text-sm text-gray-600">
                    New to the community? 
                    <a href="{{ route('register') }}" class="font-bold text-indigo-600 hover:text-indigo-500">Create an account</a>
                </p>
            </div>
        </div>

        <div class="hidden lg:block w-1/2 relative">
            <img 
                src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" 
                alt="Modern shared living room" 
                class="absolute inset-0 h-full w-full object-cover"
            >
            <div class="absolute inset-0 bg-indigo-900/30 flex items-center justify-center p-12">
                <div class="bg-white/10 backdrop-blur-lg p-8 rounded-2xl border border-white/20 text-white max-w-sm text-center">
                    <div class="mb-4 flex justify-center">
                        <span class="p-3 bg-indigo-600 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </span>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">Secure Access</h3>
                    <p class="opacity-90">Your privacy and security are our top priorities in the CoLive community.</p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>