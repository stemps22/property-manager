<?php

namespace App\Filament\Resources;

use App\Models\Property;
use App\Filament\Resources\Properties\Pages;
use Filament\Resources\Resource;
use Filament\Schemas\Schema; // Filament v5 Form engine
use Filament\Tables\Table;   // Filament v5 Table engine

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-home-modern';

    protected static bool $isScopedToTenant = true;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Section::make('Property Details')
                    ->components([
                        \Filament\Forms\Components\TextInput::make('title')->required(),
                        \Filament\Forms\Components\TextInput::make('price')->numeric()->prefix('£')->required(),
                        \Filament\Forms\Components\Textarea::make('address')->required()->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('title')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('price')->money('GBP'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
