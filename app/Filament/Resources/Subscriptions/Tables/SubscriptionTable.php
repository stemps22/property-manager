<?php

namespace App\Filament\Resources\Subscriptions\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
// Unified Filament 5 Action Namespaces
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

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

                TextColumn::make('stripe_price')
                    ->label('Price ID'),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Add any subscription filters here
            ])
            ->actions([
                // If you were using Filament\Tables\Actions\Action, 
                // change the import to Filament\Actions\Action at the top.
                Action::make('view_in_stripe')
                    ->label('View in Stripe')
                    ->url(fn ($record): string => "https://dashboard.stripe.com/subscriptions/{$record->stripe_id}")
                    ->openUrlInNewTab()
                    ->icon('heroicon-m-arrow-top-right-on-square'),
                
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