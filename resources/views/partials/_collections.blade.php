<section class="py-10" style="background: #f5f3f0;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-4xl font-bold text-deep-cove font-libra-serif">Featured Collections</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($collections as $item)
            <a href="{{ $item->url ?? '#' }}" class="group cursor-pointer block">
                <div class="relative overflow-hidden h-64 md:h-80 shadow-lg hover:shadow-xl transition-all duration-300">
                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                        <h3 class="text-base md:text-lg font-semibold leading-tight font-libra-serif">{{ $item->title }}</h3>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
