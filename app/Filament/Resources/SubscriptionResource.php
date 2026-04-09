<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Subscriptions\Pages;
use App\Filament\Resources\Subscriptions\Tables\SubscriptionTable;
use App\Models\Subscription;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use BackedEnum;

class SubscriptionResource extends Resource
{
    protected static ?string $model = Subscription::class;

    /**
     * Explicitly define the relationship name used for tenant scoping.
     * This prevents the LogicException by overriding Filament's default guess.
     */
    protected static ?string $tenantOwnershipRelationshipName = 'business';

    /**
     * Correct 2026 syntax for Filament 5.
     */
    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedCreditCard;

    public static function table(Table $table): Table
    {
        return SubscriptionTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscriptions::route('/'),
        ];
    }
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery();
    }
}