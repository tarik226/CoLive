<x-guest-layout>
    <x-navbar-layout></x-navbar-layout>
    <section class="relative bg-white pt-16 pb-20 lg:pt-24 lg:pb-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-semibold bg-indigo-100 text-indigo-700 uppercase tracking-wide">
                        New way of living
                    </span>
                    <h1 class="mt-4 text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        Find your home, <br/>
                        <span class="text-indigo-600">meet your community.</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                        CoLive makes shared living simple. Discover curated co-location spaces with people who share your vibe, interests, and lifestyle.
                    </p>
                    <div class="mt-8 sm:max-w-lg sm:mx-auto sm:text-center lg:text-left">
                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <a href="{{ route('register') }}" class="flex items-center justify-center px-8 py-3 border border-transparent text-base font-bold rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg shadow-lg shadow-indigo-200 transition-all">
                                Get Started
                            </a>
                            <a href="#listings" class="flex items-center justify-center px-8 py-3 border border-gray-200 text-base font-bold rounded-xl text-gray-700 bg-gray-50 hover:bg-gray-100 md:py-4 md:text-lg transition-all">
                                Browse Rooms
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center">
                    <div class="relative mx-auto w-full rounded-3xl shadow-2xl overflow-hidden">
                        <img class="w-full h-full object-cover" src="{{ asset('storage/roommates-sharing-meal.avif') }}" alt="Roommates sharing a meal">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Why CoLive?</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Verified Roommates</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Safety first. We verify every profile to ensure a trustworthy community for everyone.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">All-Inclusive Bills</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">One payment, no stress. Rent, WiFi, and utilities are always bundled together.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Flexible Terms</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Choose your stay. From 3 months to 3 years, we adapt to your life changes.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="listings" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Featured Homes</h2>
                    <p class="text-gray-500 mt-2">Recently added spaces in your area.</p>
                </div>
                <a href="#" class="hidden sm:block text-indigo-600 font-bold hover:underline">View all spaces &rarr;</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="group cursor-pointer">
                    <div class="relative h-64 overflow-hidden rounded-2xl mb-4">
                        <img class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500" src="https://images.unsplash.com/photo-1554995207-c18c203602cb?auto=format&fit=crop&q=80&w=800" alt="Modern Kitchen">
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-lg text-xs font-bold text-indigo-600">
                            Available Now
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition">Sunnyside Shared Loft</h3>
                    <p class="text-gray-500 text-sm">Downtown District • 3 Roommates</p>
                    <div class="mt-3 flex items-center justify-between">
                        <span class="text-indigo-600 font-extrabold text-lg">$850<span class="text-gray-400 text-sm font-normal">/mo</span></span>
                    </div>
                </div>
                
                </div>
        </div>
    </section>

    <section class="bg-indigo-600 py-16">
        <div class="max-center text-center px-4">
            <h2 class="text-3xl font-bold text-white mb-6">Ready to find your new family?</h2>
            <a href="{{ route('register') }}" class="inline-block bg-white text-indigo-600 px-10 py-4 rounded-xl font-bold text-lg hover:bg-gray-100 transition shadow-xl">
                Create Free Account
            </a>
        </div>
    </section>
</x-guest-layout>