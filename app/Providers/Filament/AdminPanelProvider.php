<?php

namespace App\Providers\Filament;

use App\Models\Business;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Illuminate\Database\Eloquent\Model;
use Filament\Widgets;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use App\Filament\Billing\BillingProvider; // Import the new class

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            //->tenant(\App\Models\Business::class, slugAttribute: 'slug')
            // Filament 5 Closure-based Billing Provider
            // This bypasses the need for the 'Contracts\Provider' interface
            //->tenantBillingProvider(new BillingProvider())
            //->requiresTenantSubscription()
            ->path('admin')
            ->homeUrl('/admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->registration(\App\Filament\Pages\Auth\Register::class)
            ->passwordReset()
            ->emailVerification()
            ->profile()
            // 1. Restore 2FA and Profile features
            ->plugins([
                BreezyCore::make()
                    ->myProfile(
                        shouldRegisterUserMenu: true,
                        shouldRegisterNavigation: false,
                        hasAvatars: false,
                        slug: 'my-profile'
                    )
                    // don;t let Breezy override everything
                    //->withRegistration()
                    ->enableTwoFactorAuthentication(
                        force: false, 
                    ),
            ])
            ->brandName(config('filament-admin.brand_name'))
            ->colors([
                'primary' => config('filament-admin.colors.primary'),
                'gray' => config('filament-admin.colors.gray'),
            ])
            ->font(config('filament-admin.font'))
            /*->tenant(
                model: config('filament-admin.tenant.model'),
                slugAttribute: config('filament-admin.tenant.slug_attribute'),
                ownershipRelationship: config('filament-admin.tenant.ownership_relationship')
            )*/
            /*->tenantMiddleware([
                \App\Http\Middleware\VerifySubscription::class,
            ], isPersistent: true)*/
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                \Filament\Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                \Filament\Http\Middleware\Authenticate::class,
            ])
            ->sidebarCollapsibleOnDesktop(config('filament-admin.sidebar_collapsible'))
            ->sidebarWidth(config('filament-admin.sidebar_width'))
            ->collapsedSidebarWidth(config('filament-admin.collapsed_sidebar_width'));
    }
}