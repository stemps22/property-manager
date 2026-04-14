<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSlides\Pages;
use App\Filament\Resources\HeroSlides\Schemas\HeroSlideSchema;
use App\Filament\Resources\HeroSlides\Tables\HeroSlideTable;
use App\Models\HeroSlide;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class HeroSlideResource extends Resource
{
    protected static ?string $model = HeroSlide::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedPresentationChartBar;

    protected static string | UnitEnum | null $navigationGroup = 'Website Content';

    protected static bool $isScopedToTenant = false;

    /**
     * Access restricted to Super-Admins.
     */
    public static function canAccess(): bool
    {
        return auth()->user()?->role === 'super-admin';
    }

    /**
     * Logic outsourced to Schemas folder.
     */
    public static function form(Schema $schema): Schema
    {
        return HeroSlideSchema::make($schema);
    }

    /**
     * Logic outsourced to Tables folder.
     */
    public static function table(Table $table): Table
    {
        return HeroSlideTable::make($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHeroSlides::route('/'),
            'create' => Pages\CreateHeroSlide::route('/create'),
            'edit' => Pages\EditHeroSlide::route('/{record}/edit'),
        ];
    }
}
