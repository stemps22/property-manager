<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baby-Friendly Boltholes | Luxury Family Holiday Accommodation UK</title>

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'libra-serif': ['Libre Baskerville', 'serif'],
                        'playfair': ['Playfair Display', 'serif'],
                    },
                    colors: {
                        'soft-sand': '#F6F2EB',
                        'deep-cove': '#2D4A55',
                        'sea-foam': '#CFE9DF',
                        'warm-coral': '#F4A28C',
                        'ocean-mist': '#B4D0D9',
                        'sea-mist': '#6B8A8F',
                    }
                }
            }
        }
    </script>

    <style>
        body { font-family: system-ui, -apple-system, sans-serif; }
        .hero-slide { transition: opacity 1s ease-in-out; }
        .carousel-track { transition: transform 0.5s ease-in-out; }
        .carousel-track::-webkit-scrollbar { display: none; }
        .custom-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%232D4A55' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            padding-right: 2rem;
        }
        @keyframes gentle-pulse {
            0%, 100% { box-shadow: 0 4px 20px rgba(180, 208, 217, 0.4); }
            50% { box-shadow: 0 4px 30px rgba(180, 208, 217, 0.7); }
        }
        .floating-cta { animation: gentle-pulse 2s ease-in-out infinite; }
        .floating-cta:hover { animation: none; }
    </style>
</head>
<body class="bg-white text-deep-cove">

    @include('partials._nav')

    <main>
        @yield('content')
    </main>

    @include('partials._footer')

    <script>
        // Hero Slideshow
        const slides = document.querySelectorAll('.hero-slide');
        const indicators = document.querySelectorAll('.hero-indicator');
        let currentSlide = 0;

        function showSlide(index) {
            if(!slides.length) return;
            slides.forEach(s => s.style.opacity = '0');
            indicators.forEach(i => { i.classList.remove('bg-white'); i.classList.add('bg-white/50'); });
            slides[index].style.opacity = '1';
            indicators[index].classList.remove('bg-white/50');
            indicators[index].classList.add('bg-white');
            currentSlide = index;
        }

        if(slides.length > 0) {
            setInterval(() => { showSlide((currentSlide + 1) % slides.length); }, 5000);
            indicators.forEach((ind, i) => { ind.addEventListener('click', () => showSlide(i)); });
        }

        // Mobile Menu
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        const mobileMenuBackdrop = document.getElementById('mobile-menu-backdrop');

        mobileMenuBtn?.addEventListener('click', () => mobileMenu.classList.remove('hidden'));
        mobileMenuClose?.addEventListener('click', () => mobileMenu.classList.add('hidden'));
        mobileMenuBackdrop?.addEventListener('click', () => mobileMenu.classList.add('hidden'));
    </script>
</body>
</html>
