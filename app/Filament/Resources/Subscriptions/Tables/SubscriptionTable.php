<?php

namespace App\Filament\Resources\Subscriptions\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Illuminate\Support\Facades\Auth;

class SubscriptionTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('stripe_id')
                    ->label('Stripe ID')
                    ->copyable()
                    ->searchable(),

                TextColumn::make('stripe_status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'past_due', 'unpaid' => 'danger',
                        'canceled' => 'gray',
                        default => 'warning',
                    }),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                /**
                 * FIXED: Use billingPortalUrl() instead of redirectToBillingPortal().
                 * This returns a string so the page loads normally, and only 
                 * redirects when the user actually clicks the button.
                 */
                Action::make('manage_billing')
                    ->label('Manage Billing')
                    ->icon('heroicon-m-credit-card')
                    ->color('success')
                    ->url(fn ($record) => $record->business->billingPortalUrl(
                        route('filament.admin.resources.subscriptions.index', [
                            'tenant' => $record->business->getRouteKey()
                        ])
                    ))
                    ->openUrlInNewTab(),

                Action::make('view_in_stripe')
                    ->label('View in Stripe')
                    ->url(fn ($record): string => "https://dashboard.stripe.com/subscriptions/{$record->stripe_id}")
                    ->openUrlInNewTab()
                    ->icon('heroicon-m-arrow-top-right-on-square')
                    ->color('gray')
                    ->visible(fn () => Auth::user()?->is_admin ?? false),
                
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}