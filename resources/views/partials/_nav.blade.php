<nav id="main-nav" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="font-libra-serif text-xl font-bold text-white">Baby-Friendly Boltholes</a>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ url('/destinations') }}" class="nav-link text-white hover:text-white/80 transition-colors text-base">Destinations</a>
                <a href="{{ url('/inspiration') }}" class="nav-link text-white hover:text-white/80 transition-colors text-base">Inspiration</a>
                <a href="{{ url('/new') }}" class="nav-link text-white hover:text-white/80 transition-colors text-base">New & Noteworthy</a>
                <a href="{{ url('/concierge') }}" class="nav-cta-btn bg-white/20 text-white border border-white/40 hover:bg-white/30 px-4 py-2 text-base font-medium transition-colors inline-flex items-center gap-2">
                    Parent Concierge
                    <span class="text-xs font-bold px-1.5 py-0.5 bg-white text-warm-coral">FREE</span>
                </a>
                <div class="flex items-center space-x-4">
                    <svg class="h-5 w-5 text-white cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
                    <svg class="h-5 w-5 text-white cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path></svg>
                </div>
            </div>

            <div class="flex md:hidden items-center space-x-4">
                <button id="mobile-menu-btn" class="text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>
    </div>
</nav>

<div id="mobile-menu" class="fixed inset-0 z-[60] hidden">
    <div class="absolute inset-0 bg-black/40" id="mobile-menu-backdrop"></div>
    <div class="absolute right-0 top-0 bottom-0 w-[300px] bg-soft-sand p-6 pt-12 shadow-xl">
        <button id="mobile-menu-close" class="absolute top-4 right-4 text-deep-cove">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"></path></svg>
        </button>
        <div class="flex flex-col space-y-6 mt-4">
            <a href="{{ url('/destinations') }}" class="block text-deep-cove text-lg">Destinations</a>
            <a href="{{ url('/inspiration') }}" class="block text-deep-cove text-lg">Inspiration</a>
            <a href="{{ url('/concierge') }}" class="block text-deep-cove text-lg">Parent Concierge</a>
        </div>
    </div>
</div>
