<?php

use Filament\Support\Colors\Color;

return [

    /*
    |--------------------------------------------------------------------------
    | Branding & Aesthetics
    |--------------------------------------------------------------------------
    */

    'brand_name' => 'Property Manager Pro',

    'colors' => [
        'primary' => Color::Amber,
        'gray' => Color::Slate,
    ],

    'font' => 'Inter',

    /*
    |--------------------------------------------------------------------------
    | Tenancy Configuration
    |--------------------------------------------------------------------------
    */

    'tenant' => [
        'model' => \App\Models\Business::class,
        'slug_attribute' => 'slug',
        'ownership_relationship' => 'businesses',
    ],

    /*
    |--------------------------------------------------------------------------
    | Navigation & Layout
    |--------------------------------------------------------------------------
    */

    'top_navigation' => false,

    'sidebar_collapsible' => true,

    'sidebar_width' => '20rem',

    'collapsed_sidebar_width' => '9rem',

];
