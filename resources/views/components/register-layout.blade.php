
    <x-guest-layout>
    <div class="flex min-h-screen bg-white">
        <div class="hidden lg:block w-1/2 relative">
            <img 
                src="{{ asset('storage/co-live.webp') }}" 
                alt="Co-living space" 
                class="absolute inset-0 h-full w-full object-cover"
            >
            <div class="absolute inset-0 bg-indigo-900/20 flex items-center justify-center p-12">
                <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl border border-white/20 text-white max-w-md">
                    <h2 class="text-4xl font-bold mb-4">Find your next home community.</h2>
                    <p class="text-lg opacity-90">Join thousands of people sharing spaces, stories, and lives in curated co-living homes.</p>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-16">
            <div class="max-w-md w-full">
                <div class="mb-10 lg:mb-12">
                    <h1 class="text-3xl font-extrabold text-indigo-600 tracking-tight">CoLive.</h1>
                    <h2 class="mt-6 text-2xl font-bold text-gray-900">Create your account</h2>
                    <p class="mt-2 text-gray-500">Start your journey toward better living.</p>
                </div>

                <form action="{{route('register')}}" method="POST" class="space-y-5">
                    @csrf
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Full Name</label>
                        <input type="text" name="name" placeholder="John Doe" required 
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white transition duration-200">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Email Address</label>
                        <input type="email" name="email" placeholder="name@company.com" required 
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white transition duration-200">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Password</label>
                            <input type="password" name="password" placeholder="••••••••" required 
                                class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white transition duration-200">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Confirm</label>
                            <input type="password" name="password_confirmation" placeholder="••••••••" required 
                                class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white transition duration-200">
                        </div>
                    </div>

                    <div class="flex items-center space-x-2 py-2">
                        <input type="checkbox" id="terms" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <label for="terms" class="text-sm text-gray-500">I agree to the <a href="#" class="text-indigo-600 underline">Terms of Service</a></label>
                    </div>

                    <button type="submit" 
                        class="w-full py-4 px-6 text-white bg-indigo-600 hover:bg-indigo-700 font-bold rounded-xl shadow-lg shadow-indigo-200 transition-all transform active:scale-[0.98]">
                        Join the Community
                    </button>
                </form>

                <p class="mt-8 text-center text-sm text-gray-600">
                    Already have an account? 
                    <a href="{{route('login')}}" class="font-bold text-indigo-600 hover:text-indigo-500">Sign in here</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
