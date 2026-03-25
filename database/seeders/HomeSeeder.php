<?php

namespace Database\Seeders;

use App\Models\HeroSlide;
use App\Models\Collection;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Seed Hero Slides (Using Unsplash URLs from your original HTML)
        $heroImages = [
            'https://images.unsplash.com/photo-1502086223501-7ea6ecd79368?w=1920&q=80',
            'https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=1920&q=80',
            'https://images.unsplash.com/photo-1506929562872-bb421503ef21?w=1920&q=80',
            'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1920&q=80',
            'https://images.unsplash.com/photo-1544550581-5f7ceaf7f992?w=1920&q=80',
        ];

        foreach ($heroImages as $index => $url) {
            HeroSlide::create([
                'image_path' => $url, // Note: For production, you'll upload these via Filament
                'order' => $index,
            ]);
        }

        // 2. Seed Featured Collections
        $collections = [
            [
                'title' => 'Overseas Self-Catering',
                'image_path' => 'https://images.unsplash.com/photo-1602002418816-5c0aeef426aa?w=800',
                'url' => '#',
                'order' => 1,
            ],
            [
                'title' => 'Overseas Hotels',
                'image_path' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800',
                'url' => '#',
                'order' => 2,
            ],
            [
                'title' => 'UK Self Catering',
                'image_path' => 'https://images.unsplash.com/photo-1518780664697-55e3ad937233?w=800',
                'url' => '#',
                'order' => 3,
            ],
            [
                'title' => 'UK Hotels',
                'image_path' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800',
                'url' => '#',
                'order' => 4,
            ],
        ];

        foreach ($collections as $collection) {
            Collection::create($collection);
        }

        // 3. Seed Testimonials
        $testimonials = [
            [
                'name' => 'James R.',
                'location' => 'London',
                'quote' => 'The matchmaking service is brilliant. Saved us hours of research and they found accommodations we never would have discovered on our own.',
                'stars' => 5,
            ],
            [
                'name' => 'Lucy M.',
                'location' => 'Manchester',
                'quote' => 'Worth every penny (even though it is free!). They really listened to what we wanted and came back with perfect options. Booked immediately.',
                'stars' => 5,
            ],
            [
                'name' => 'David Thompson',
                'location' => 'Bristol',
                'quote' => 'I was overwhelmed by choice until I used their shortlist service. Within 24 hours I had 3 amazing options, all perfect for our family.',
                'stars' => 5,
            ],
            [
                'name' => 'Sophie K.',
                'location' => 'Edinburgh',
                'quote' => 'Absolutely fantastic! The team understood exactly what we needed - somewhere child-friendly but still relaxing for adults.',
                'stars' => 5,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
