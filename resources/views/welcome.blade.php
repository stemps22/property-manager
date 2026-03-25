@extends('layouts.app')

@section('content')
    <section id="hero-slideshow" class="relative flex items-center justify-center overflow-hidden pt-16" style="height: 85vh;">
    @foreach($heroSlides as $index => $slide)
    <div class="hero-slide absolute inset-0 bg-cover bg-center bg-no-repeat {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
         style="background-image: url('{{ asset($slide) }}');">
        <div class="absolute inset-0 bg-black/40"></div>
    </div>
    @endforeach

    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
        @foreach($heroSlides as $index => $slide)
        <button class="hero-indicator w-3 h-3 transition-all duration-300 {{ $index === 0 ? 'bg-white' : 'bg-white/50' }}" data-slide="{{ $index }}"></button>
        @endforeach
    </div>

    <!-- Hero content -->
    <div class="relative z-10 text-center text-white max-w-6xl mx-auto px-4">
      <h1 class="text-3xl sm:text-4xl md:text-6xl font-bold mb-4 md:mb-6 leading-tight font-libra-serif">
        Family Holidays Made Easy
      </h1>
      <p class="text-base sm:text-xl md:text-2xl mb-4 md:mb-6 font-light opacity-90 px-2">
        Exceptional, family-friendly hotels, villas &amp; cottages – reviewed and rated by parents.
      </p>

      <!-- Search Bar -->
      <div class="bg-deep-cove/60 backdrop-blur-sm rounded-lg p-4 md:p-6 max-w-6xl mx-auto">
        <p class="text-white/90 text-xs sm:text-sm mb-3 md:mb-4 text-center leading-relaxed">
          Browse and book direct, or skip the scroll with our <a href="https://id-preview--21f2170f-4d41-4176-a481-552dd98ceccc.lovable.app/homepage-standalone.html#" class="font-semibold underline hover:text-white transition-colors">FREE parent concierge shortlist service</a>
        </p>
        <div class="grid grid-cols-2 md:flex md:flex-nowrap gap-2 items-end">
          <div class="col-span-1 md:flex-1 md:min-w-[180px]">
            <select class="custom-select w-full bg-white border border-deep-cove h-11 md:h-12 text-deep-cove text-xs md:text-sm px-3 rounded-none">
              <option value="">📍 DESTINATIONS</option>
              <option value="uk">UK</option>
              <option value="europe">EUROPE</option>
              <option value="mediterranean">MEDITERRANEAN</option>
              <option value="caribbean">CARIBBEAN</option>
              <option value="worldwide">WORLDWIDE</option>
            </select>
          </div>
          <div class="col-span-1 md:flex-1 md:min-w-[180px]">
            <select class="custom-select w-full bg-white border border-deep-cove h-11 md:h-12 text-deep-cove text-xs md:text-sm px-3 rounded-none">
              <option value="">🏠 HOLIDAY TYPE</option>
              <option value="hotels">HOTELS</option>
              <option value="rentals">RENTALS</option>
            </select>
          </div>
          <div class="col-span-1 md:flex-1 md:min-w-[140px]">
            <select class="custom-select w-full bg-white border border-deep-cove h-11 md:h-12 text-deep-cove text-xs md:text-sm px-3 rounded-none">
              <option value="">👥 SLEEPS</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8+">8+</option>
            </select>
          </div>
          <div class="col-span-1 md:flex-1 md:min-w-[160px]">
            <select class="custom-select w-full bg-white border border-deep-cove h-11 md:h-12 text-deep-cove text-xs md:text-sm px-3 rounded-none">
              <option value="">👶 BY AGE</option>
              <option value="babies">BABIES (0-2)</option>
              <option value="toddlers">TODDLERS (2-4)</option>
              <option value="young-kids">YOUNG KIDS (4-8)</option>
              <option value="older-kids">OLDER KIDS (8-12)</option>
              <option value="teens">TEENS (12+)</option>
              <option value="all-ages">ALL AGES</option>
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

  <!-- Press Quotes -->
  <section class="py-6" style="background: rgba(221, 215, 207, 0.8); backdrop-filter: blur(4px);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid md:grid-cols-2 gap-8 text-center">
        <div class="flex flex-col items-center justify-center">
          <p class="text-2xl font-medium text-deep-cove italic">"Inspired and indispensable"</p>
          <p class="text-sm tracking-[0.2em] uppercase text-sea-mist font-semibold mt-2">Condé Nast Traveller</p>
        </div>
        <div class="flex flex-col items-center justify-center">
          <p class="text-2xl font-medium text-deep-cove italic">"Both stylish and genuinely child-friendly"</p>
          <p class="text-sm tracking-[0.2em] uppercase text-sea-mist font-semibold mt-2">Tatler</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Collections -->
  <section class="py-10" style="background: #f5f3f0;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-8">
        <h2 class="text-4xl font-bold text-deep-cove font-libra-serif">
          Featured Collections
        </h2>
        <div class="mt-4 text-sea-mist max-w-3xl mx-auto leading-relaxed space-y-3">
          <p>Browse family-friendly hotels, villas and cottages that are genuinely welcoming to families.</p>
          <p>From gated pools and stairgates in private villas to hotels offering kids' menus and childcare.</p>
          <p>Follow weblinks and book direct, or ask our <a href="https://id-preview--21f2170f-4d41-4176-a481-552dd98ceccc.lovable.app/homepage-standalone.html#" class="text-warm-coral underline hover:opacity-80 transition-opacity">Parent Concierge</a> for a personalised shortlist and extra perks.</p>
        </div>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="https://id-preview--21f2170f-4d41-4176-a481-552dd98ceccc.lovable.app/homepage-standalone.html#" class="group cursor-pointer block">
          <div class="relative overflow-hidden h-64 md:h-80 shadow-lg hover:shadow-xl transition-all duration-300">
            <img src="./Baby-Friendly Boltholes _ Luxury Family Holiday Accommodation UK_files/photo-1602002418816-5c0aeef426aa" alt="Overseas Self-Catering" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
              <h3 class="text-base md:text-lg font-semibold leading-tight font-libra-serif">Overseas Self-Catering</h3>
            </div>
          </div>
        </a>
        <a href="https://id-preview--21f2170f-4d41-4176-a481-552dd98ceccc.lovable.app/homepage-standalone.html#" class="group cursor-pointer block">
          <div class="relative overflow-hidden h-64 md:h-80 shadow-lg hover:shadow-xl transition-all duration-300">
            <img src="./Baby-Friendly Boltholes _ Luxury Family Holiday Accommodation UK_files/photo-1571896349842-33c89424de2d" alt="Overseas Hotels" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
              <h3 class="text-base md:text-lg font-semibold leading-tight font-libra-serif">Overseas Hotels</h3>
            </div>
          </div>
        </a>
        <a href="https://id-preview--21f2170f-4d41-4176-a481-552dd98ceccc.lovable.app/homepage-standalone.html#" class="group cursor-pointer block">
          <div class="relative overflow-hidden h-64 md:h-80 shadow-lg hover:shadow-xl transition-all duration-300">
            <img src="./Baby-Friendly Boltholes _ Luxury Family Holiday Accommodation UK_files/photo-1518780664697-55e3ad937233" alt="UK Self Catering" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
              <h3 class="text-base md:text-lg font-semibold leading-tight font-libra-serif">UK Self Catering</h3>
            </div>
          </div>
        </a>
        <a href="https://id-preview--21f2170f-4d41-4176-a481-552dd98ceccc.lovable.app/homepage-standalone.html#" class="group cursor-pointer block">
          <div class="relative overflow-hidden h-64 md:h-80 shadow-lg hover:shadow-xl transition-all duration-300">
            <img src="./Baby-Friendly Boltholes _ Luxury Family Holiday Accommodation UK_files/photo-1566073771259-6a8506099945" alt="UK Hotels" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
              <h3 class="text-base md:text-lg font-semibold leading-tight font-libra-serif">UK Hotels</h3>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- Inspiration Journal (Editors Pick Carousel) -->
  <section class="py-10 bg-deep-cove">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-8">
        <h2 class="text-4xl font-bold text-white mb-4 font-libra-serif">
          Inspiration Journal
        </h2>
        <p class="text-lg text-white/80 max-w-3xl mx-auto">
          Looking for ideas? Get inspiration for your best family holiday yet via real reviews from our panel of family travel influencers, or curated collections put together by our <a href="https://id-preview--21f2170f-4d41-4176-a481-552dd98ceccc.lovable.app/homepage-standalone.html#" class="text-white underline hover:text-white/80 transition-colors">Parent Concierge team</a>.
        </p>
      </div>

      <!-- Carousel -->
      <div class="relative overflow-hidden">
        <div id="inspiration-carousel" class="carousel-track flex gap-4" style="scroll-behavior: smooth; transform: translateX(-411px);">
          <!-- Card 1 -->
          <a href="https://id-preview--21f2170f-4d41-4176-a481-552dd98ceccc.lovable.app/homepage-standalone.html#" class="group cursor-pointer block flex-shrink-0 w-full md:w-[calc(50%-0.5rem)] lg:w-[calc(33.333%-0.667rem)]">
            <div class="relative overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
              <img src="./Baby-Friendly Boltholes _ Luxury Family Holiday Accommodation UK_files/photo-1499678329028-101435549a4e" alt="Best Family-Friendly Holidays in France" class="w-full h-[448px] object-cover group-hover:scale-105 transition-transform duration-300">
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
              <div class="absolute top-4 left-4 bg-white text-deep-cove px-3 py-1 text-sm font-semibold">Parent Concierge</div>
              <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                <h3 class="text-lg font-semibold mb-2 leading-tight font-libra-serif">Best Family-Friendly Holidays in France</h3>
                <p class="text-sm opacity-90">Discover charming French countryside retreats perfect for families</p>
              </div>
            </div>
          </a>
          <!-- Card 2 -->
          <a href="https://id-preview--21f2170f-4d41-4176-a481-552dd98ceccc.lovable.app/homepage-standalone.html#" class="group cursor-pointer block flex-shrink-0 w-full md:w-[calc(50%-0.5rem)] lg:w-[calc(33.333%-0.667rem)]">
            <div class="relative overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
              <img src="./Baby-Friendly Boltholes _ Luxury Family Holiday Accommodation UK_files/photo-1540541338287-41700207dee6" alt="Our Latest Parent Panel Review" class="w-full h-[448px] object-cover group-hover:scale-105 transition-transform duration-300">
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
              <div class="absolute top-4 left-4 bg-white text-deep-cove px-3 py-1 text-sm font-semibold">Parent Panel</div>
              <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                <h3 class="text-lg font-semibold mb-2 leading-tight font-libra-serif">Our Latest Parent Panel Review</h3>
                <p class="text-sm opacity-90">Real families share their honest experiences from their latest stays</p>
              </div>
            </div>
          </a>
          <!-- Card 3 -->
          <a href="https://id-preview--21f2170f-4d41-4176-a481-552dd98ceccc.lovable.app/homepage-standalone.html#" class="group cursor-pointer block flex-shrink-0 w-full md:w-[calc(50%-0.5rem)] lg:w-[calc(33.333%-0.667rem)]">
            <div class="relative overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
              <img src="./Baby-Friendly Boltholes _ Luxury Family Holiday Accommodation UK_files/photo-1523531294919-4bcd7c65e216" alt="Best Family-Friendly Holidays in Italy" class="w-full h-[448px] object-cover group-hover:scale-105 transition-transform duration-300">
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
              <div class="absolute top-4 left-4 bg-white text-deep-cove px-3 py-1 text-sm font-semibold">Parent Concierge</div>
              <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                <h3 class="text-lg font-semibold mb-2 leading-tight font-libra-serif">Best Family-Friendly Holidays in Italy</h3>
                <p class="text-sm opacity-90">Experience the magic of Italy with your little ones</p>
              </div>
            </div>
          </a>
          <!-- Card 4 -->
          <a href="https://id-preview--21f2170f-4d41-4176-a481-552dd98ceccc.lovable.app/homepage-standalone.html#" class="group cursor-pointer block flex-shrink-0 w-full md:w-[calc(50%-0.5rem)] lg:w-[calc(33.333%-0.667rem)]">
            <div class="relative overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
              <img src="./Baby-Friendly Boltholes _ Luxury Family Holiday Accommodation UK_files/photo-1518780664697-55e3ad937233" alt="Best Family-Friendly Holidays in UK" class="w-full h-[448px] object-cover group-hover:scale-105 transition-transform duration-300">
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
              <div class="absolute top-4 left-4 bg-white text-deep-cove px-3 py-1 text-sm font-semibold">Parent Concierge</div>
              <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                <h3 class="text-lg font-semibold mb-2 leading-tight font-libra-serif">Best Family-Friendly Holidays in UK</h3>
                <p class="text-sm opacity-90">Explore the best of Britain with family-friendly accommodations</p>
              </div>
            </div>
          </a>
        </div>
        <!-- Carousel Controls -->
        <button id="carousel-prev" class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white w-10 h-10 flex items-center justify-center shadow-lg z-10">
          <svg class="h-5 w-5 text-deep-cove" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6"></path></svg>
        </button>
        <button id="carousel-next" class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white w-10 h-10 flex items-center justify-center shadow-lg z-10">
          <svg class="h-5 w-5 text-deep-cove" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"></path></svg>
        </button>
      </div>

      <div class="text-center mt-10">
        <a href="https://id-preview--21f2170f-4d41-4176-a481-552dd98ceccc.lovable.app/homepage-standalone.html#" class="inline-flex items-center justify-center bg-white text-deep-cove hover:bg-white/90 px-8 h-11 font-semibold uppercase text-sm transition-colors">
          View All Articles you daft bastard
        </a>
      </div>
    </div>
  </section>

  <!-- Newsletter Signup - "Join our inner circle" -->
  <section class="bg-soft-sand py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid md:grid-cols-2 gap-12 items-center">
        <!-- Left content -->
        <div>
          <h2 class="text-3xl md:text-4xl font-playfair text-deep-cove mb-6">
            Join our <span class="italic text-warm-coral">inner circle.</span>
          </h2>
          <p class="font-libra-serif text-deep-cove/80 mb-8 max-w-md">
            Receive hand-picked travel inspiration, member-only perks, and early access to our newest luxury family-friendly retreats.
          </p>

          <form class="space-y-4 max-w-md" onsubmit="event.preventDefault(); alert(&#39;Thank you for subscribing!&#39;);">
            <div class="relative">
              <input type="email" placeholder="ENTER YOUR EMAIL ADDRESS HERE" required="" class="w-full border-0 border-b-2 border-warm-coral bg-transparent px-0 py-3 text-sm tracking-wider placeholder:text-warm-coral/70 focus:outline-none focus:border-deep-cove text-deep-cove">
            </div>
            <button type="submit" class="w-full bg-warm-coral hover:bg-warm-coral/90 text-deep-cove py-4 text-base font-medium uppercase inline-flex items-center justify-center gap-2 transition-opacity">
              Join the club
              <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"></path></svg>
            </button>
          </form>
        </div>

        <!-- Right side - stacked polaroid images -->
        <div class="hidden md:flex justify-center items-center">
          <div class="relative w-80 h-80">
            <!-- Back polaroid -->
            <div class="absolute top-4 right-0 w-64 h-72 bg-white shadow-lg p-3" style="transform: rotate(6deg);">
              <div class="w-full h-52 bg-sea-foam rounded-sm"></div>
            </div>
            <!-- Front polaroid -->
            <div class="absolute top-0 left-4 w-64 h-72 bg-white shadow-xl p-3" style="transform: rotate(-3deg);">
              <img src="./Baby-Friendly Boltholes _ Luxury Family Holiday Accommodation UK_files/photo-1476514525535-07fb3b4ae5f1" alt="Family enjoying breakfast at a holiday villa" class="w-full h-52 object-cover rounded-sm">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Introducing Our Parent Concierge Service (Testimonials) -->
  <section class="py-16 bg-warm-coral">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-serif text-white mb-4">
          Introducing Our Parent Concierge Service
        </h2>
        <p class="text-white max-w-3xl mx-auto text-lg mb-6">
          Skip the scroll and let our Parent Concierge create a short list of perfect places for you. We'll use our contacts to find your perfect matches and sometimes get you some free perks and exclusive rates too!
        </p>
        <div class="flex items-center justify-center gap-2 mb-2">
          <div class="flex text-yellow-400 text-lg">★★★★★</div>
          <span class="text-white font-semibold">5.0</span>
        </div>
        <p class="text-white">Based on 150+ Google Reviews</p>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Testimonial 1 -->
        <div class="bg-white/95 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
          <div class="flex gap-1 mb-4 text-yellow-400">★★★★★</div>
          <blockquote class="text-deep-cove mb-4 leading-relaxed text-sm">
            "The matchmaking service is brilliant. Saved us hours of research and they found accommodations we never would have discovered on our own."
          </blockquote>
          <div class="border-t border-sea-mist/20 pt-4">
            <p class="text-deep-cove font-semibold text-sm">James R.</p>
            <p class="text-sea-mist text-xs">London</p>
          </div>
        </div>
        <!-- Testimonial 2 -->
        <div class="bg-white/95 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
          <div class="flex gap-1 mb-4 text-yellow-400">★★★★★</div>
          <blockquote class="text-deep-cove mb-4 leading-relaxed text-sm">
            "Worth every penny (even though it's free!). They really listened to what we wanted and came back with perfect options. Booked immediately."
          </blockquote>
          <div class="border-t border-sea-mist/20 pt-4">
            <p class="text-deep-cove font-semibold text-sm">Lucy M.</p>
            <p class="text-sea-mist text-xs">Manchester</p>
          </div>
        </div>
        <!-- Testimonial 3 -->
        <div class="bg-white/95 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
          <div class="flex gap-1 mb-4 text-yellow-400">★★★★★</div>
          <blockquote class="text-deep-cove mb-4 leading-relaxed text-sm">
            "I was overwhelmed by choice until I used their shortlist service. Within 24 hours I had 3 amazing options, all perfect for our family. Can't recommend enough!"
          </blockquote>
          <div class="border-t border-sea-mist/20 pt-4">
            <p class="text-deep-cove font-semibold text-sm">David Thompson</p>
            <p class="text-sea-mist text-xs">Bristol</p>
          </div>
        </div>
        <!-- Testimonial 4 -->
        <div class="bg-white/95 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
          <div class="flex gap-1 mb-4 text-yellow-400">★★★★★</div>
          <blockquote class="text-deep-cove mb-4 leading-relaxed text-sm">
            "Absolutely fantastic! The team understood exactly what we needed - somewhere child-friendly but still relaxing for adults. The shortlist was spot on."
          </blockquote>
          <div class="border-t border-sea-mist/20 pt-4">
            <p class="text-deep-cove font-semibold text-sm">Sophie K.</p>
            <p class="text-sea-mist text-xs">Edinburgh</p>
          </div>
        </div>
      </div>

      <div class="text-center mt-8 space-y-4">
        <a href="https://id-preview--21f2170f-4d41-4176-a481-552dd98ceccc.lovable.app/homepage-standalone.html#" class="inline-flex items-center justify-center bg-deep-cove hover:bg-deep-cove/90 text-white px-8 py-3 text-lg font-semibold transition-colors">
          Try Our Free Concierge
        </a>
        <div>
          <a href="https://id-preview--21f2170f-4d41-4176-a481-552dd98ceccc.lovable.app/homepage-standalone.html#" class="text-white hover:text-white/80 underline text-sm transition-colors">Read all reviews on Google</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Matchmaking Service - "The art of an exceptional stay" -->
  <section class="py-16" style="background: #f5f0eb;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
        <h2 class="text-4xl md:text-5xl text-deep-cove mb-6 font-libra-serif">
          The art of an <span class="italic text-ocean-mist">exceptional</span> stay
        </h2>
        <p class="text-lg text-sea-mist max-w-3xl mx-auto leading-relaxed">
          From daydreaming to departure, every moment matters. Whether it's matching you to the perfect
          family-friendly villa or planning a tailored itinerary for your trip, our team are on hand to
          make your holiday dreams come true. From personally vetting each and every one of our properties
          to offering in-stay support, we think of every detail, so you don't have to.
        </p>
      </div>

      <div class="grid md:grid-cols-3 gap-6">
        <div class="relative overflow-hidden">
          <div class="relative h-[450px] md:h-[500px]">
            <img src="./Baby-Friendly Boltholes _ Luxury Family Holiday Accommodation UK_files/photo-1596394516093-501ba68a0ba6" alt="Step 1" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6">
              <p class="text-white font-semibold text-sm md:text-base leading-snug tracking-wide">
                1 - TELL US WHEN, WHERE AND WHAT YOU NEED.
              </p>
            </div>
          </div>
        </div>
        <div class="relative overflow-hidden">
          <div class="relative h-[450px] md:h-[500px]">
            <img src="./Baby-Friendly Boltholes _ Luxury Family Holiday Accommodation UK_files/photo-1540541338287-41700207dee6" alt="Step 2" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6">
              <p class="text-white font-semibold text-sm md:text-base leading-snug tracking-wide">
                2 - OUR SPECIALISTS WILL CREATE A PERSONALISED SHORTLIST OF PERFECT FAMILY-FRIENDLY STAYS FOR YOU.
              </p>
            </div>
          </div>
        </div>
        <div class="relative overflow-hidden">
          <div class="relative h-[450px] md:h-[500px]">
            <img src="./Baby-Friendly Boltholes _ Luxury Family Holiday Accommodation UK_files/photo-1476514525535-07fb3b4ae5f1(1)" alt="Step 3" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6">
              <p class="text-white font-semibold text-sm md:text-base leading-snug tracking-wide">
                3 - WE'LL HELP YOU BOOK YOUR STAY, RESERVE ANY EQUIPMENT OR SERVICES AND, OFTEN, GET SOME EXTRA PERKS TOO!
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-12">
        <a href="https://id-preview--21f2170f-4d41-4176-a481-552dd98ceccc.lovable.app/homepage-standalone.html#" class="inline-flex items-center justify-center bg-warm-coral text-deep-cove px-8 py-4 text-lg font-semibold uppercase hover:opacity-90 transition-opacity gap-2">
          Free Concierge
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"></path></svg>
        </a>
        <p class="text-sm text-sea-mist mt-3">Join 500+ families who used our free concierge to find their perfect stay</p>
      </div>
    </div>
  </section>
@endsection
