@extends('layouts.app')

@section('content')

    @include('partials._hero')

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

    @include('partials._collections')

    @include('partials._testimonials')

@endsection
