<?php

namespace App\Filament\Resources\Subscriptions\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;

class SubscriptionTable
{
    /**
     * This method must be named 'configure' to match 
     * the call in your SubscriptionResource.
     */
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tenant.name')
                    ->label('Business')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Plan Name')
                    ->badge(),
                TextColumn::make('stripe_status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'past_due', 'canceled' => 'danger',
                        'trialing' => 'info',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->label('Started')
                    ->date()
                    ->sortable(),
            ])
            ->actions([
                Action::make('downloadInvoice')
                    ->label('Statement')
                    ->icon(Heroicon::OutlinedDocumentArrowDown)
                    ->color(Color::Gray)
                    ->action(function ($record) {
                        $business = $record->tenant; 
                        $invoice = $business->latestInvoice();
                        
                        if ($invoice) {
                            return $business->downloadInvoice($invoice->id, [
                                'vendor' => config('filament-admin.brand_name'),
                                'product' => 'Subscription',
                            ]);
                        }
                    }),
            ])
            ->defaultSort('created_at', 'desc');
    }
}