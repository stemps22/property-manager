<section class="py-16 bg-warm-coral">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-serif text-white mb-4">Introducing Our Parent Concierge Service</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($testimonials as $testimonial)
            <div class="bg-white/95 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div class="flex gap-1 mb-4 text-yellow-400">
                    @for($i = 0; $i < ($testimonial->stars ?? 5); $i++)
                        ★
                    @endfor
                </div>
                <blockquote class="text-deep-cove mb-4 leading-relaxed text-sm italic">
                    "{{ $testimonial->quote }}"
                </blockquote>
                <div class="border-t border-sea-mist/20 pt-4">
                    <p class="text-deep-cove font-semibold text-sm">{{ $testimonial->name }}</p>
                    <p class="text-sea-mist text-xs">{{ $testimonial->location }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
