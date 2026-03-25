<section id="hero-slideshow" class="relative flex items-center justify-center overflow-hidden pt-16" style="height: 85vh;">
    @foreach($heroSlides as $index => $slide)
    <div class="hero-slide absolute inset-0 bg-cover bg-center bg-no-repeat {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
         style="background-image: url('{{ asset('storage/' . $slide->image_path) }}');">
        <div class="absolute inset-0 bg-black/40"></div>
    </div>
    @endforeach

    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
        @foreach($heroSlides as $index => $slide)
        <button class="hero-indicator w-3 h-3 transition-all duration-300 {{ $index === 0 ? 'bg-white' : 'bg-white/50' }}" data-slide="{{ $index }}"></button>
        @endforeach
    </div>

    <div class="relative z-10 text-center text-white max-w-6xl mx-auto px-4">
        <h1 class="text-3xl sm:text-4xl md:text-6xl font-bold mb-4 md:mb-6 leading-tight font-libra-serif">
            Family Holidays Made Easy
        </h1>
        <p class="text-base sm:text-xl md:text-2xl mb-4 md:mb-6 font-light opacity-90 px-2">
            Exceptional, family-friendly hotels, villas & cottages – reviewed and rated by parents.
        </p>

        <div class="bg-deep-cove/60 backdrop-blur-sm rounded-lg p-4 md:p-6 max-w-6xl mx-auto">
            <div class="grid grid-cols-2 md:flex md:flex-nowrap gap-2 items-end">
                <div class="col-span-1 md:flex-1 md:min-w-[180px]">
                    <select class="custom-select w-full bg-white border border-deep-cove h-11 md:h-12 text-deep-cove text-xs md:text-sm px-3 rounded-none">
                        <option value="">📍 DESTINATIONS</option>
                        <option value="uk">UK</option>
                        <option value="europe">EUROPE</option>
                    </select>
                </div>
                <button class="col-span-2 md:col-span-1 bg-warm-coral text-deep-cove px-6 h-11 md:h-12 font-semibold uppercase text-sm inline-flex items-center justify-center gap-2 hover:opacity-90 transition-opacity w-full md:w-auto whitespace-nowrap">
                    SEARCH
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
    </div>
</section>
