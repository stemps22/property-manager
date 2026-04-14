<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Owners\Pages;
use App\Filament\Resources\Owners\Pages\CreateOwner;
use App\Filament\Resources\Owners\Pages\EditOwner;
use App\Filament\Resources\Owners\Pages\ListOwners;
use App\Filament\Resources\Owners\Schemas\OwnerForm;
use Filament\Forms\Components\TextInput; // v5 Component
use App\Filament\Resources\Owners\Tables\OwnersTable;
use App\Models\Owner;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

use App\Filament\Resources\OwnerResources\RelationManagers\UsersRelationManager;

class OwnerResource extends Resource
{
    protected static ?string $model = Owner::class;

    // This controls the sidebar link
    //protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Businesses';
    protected static ?string $modelLabel = 'Business';

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Owner';

    // This stops the "Model does not have a relationship named business" error
    protected static bool $isScopedToTenant = false;

    public static function shouldRegisterNavigation(): bool
{
    return true;
}

    public static function getNavigationIcon(): string
{
    // Returns the Heroicon name as a string
    return 'heroicon-o-briefcase';
}
public static function getNavigationLabel(): string
{
    return 'Business Management';
}

public static function getModelLabel(): string
{
    return 'Business';
}

    public static function form(Schema $schema): Schema
    {
        return $schema
        ->components([
            \Filament\Schemas\Components\Section::make('Business Details')
                ->components([
                    \Filament\Forms\Components\TextInput::make('name')
                        ->required()
                        ->unique(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return OwnersTable::configure($table);
    }

    public static function getRelations(): array
{
    return [
        // This links the manager we just generated
        RelationManagers\UsersRelationManager::class,
    ];
}

    public static function getPages(): array
    {
        return [
            'index' => ListOwners::route('/'),
            'create' => CreateOwner::route('/create'),
            'edit' => EditOwner::route('/{record}/edit'),
        ];
    }
}
