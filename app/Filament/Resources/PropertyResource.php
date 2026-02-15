<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Properties\Pages;
use App\Models\Property;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;  
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn; 
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Actions\EditAction; 
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid; // Import the Grid


class PropertyResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $model = Property::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-home-modern';

    protected static bool $isScopedToTenant = true;

    public static function getEloquentQuery(): Builder
{
    // This forces every query for this resource to filter by the current tenant
    return parent::getEloquentQuery()
        ->whereIn('owner_id', auth()->user()->owners()->pluck('owners.id'));
}

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Ownership')
                ->description('Assign this property to a specific business.')
                ->components([
                    Select::make('owner_id')
                        ->label('Business / Owner')
                        ->relationship('owner', 'name') // Assumes Owner model has a 'name' column
                        ->searchable()
                        ->preload()
                        ->required()
                        ->default(auth()->user()->owner_id), // Still defaults to their "home" business
                ]),
                \Filament\Schemas\Components\Section::make('Property Images')
                    ->description('Upload high-quality photos of the property.')
                    ->components([
                        SpatieMediaLibraryFileUpload::make('images')
                            ->collection('property-images') // Name the collection
                            ->multiple()                    // Allow multiple photos
                            ->reorderable()                 // Drag to reorder
                            ->imageEditor()                 // Built-in cropping/rotation
                            ->columnSpanFull(),
                    ]),
                \Filament\Schemas\Components\Section::make('Property Details')
                    ->components([
                        Select::make('status')
                            ->options([
                                'Available' => 'Available',
                                'Under Offer' => 'Under Offer',
                                'Sold' => 'Sold',
                                'Maintenance' => 'Maintenance',
                            ])
                            ->required()
                            ->default('Available'),
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
            SpatieMediaLibraryImageColumn::make('images')
                ->label('Photo')
                ->collection('property-images')
                ->circular(),
            TextColumn::make('title')->searchable()->sortable(),
            TextColumn::make('price')->money('GBP')->sortable(),
            TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Available' => 'success',
                    'Under Offer' => 'warning',
                    'Sold' => 'danger',
                    default => 'gray',
                }),
        ])
        
        ->filters([
            \Filament\Tables\Filters\SelectFilter::make('owner_id')
        ->label('Business')
        ->relationship('owner', 'name')
        ->searchable()
        ->preload(),
            // 1. Status Filter
            SelectFilter::make('status')
                ->options([
                    'Available' => 'Available',
                    'Under Offer' => 'Under Offer',
                    'Sold' => 'Sold',
                ]),

            // 2. Price Range Filter
            Filter::make('price_range')
                ->form([
                    TextInput::make('min_price')->numeric()->prefix('£'),
                    TextInput::make('max_price')->numeric()->prefix('£'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when($data['min_price'], fn ($q, $val) => $q->where('price', '>=', $val))
                        ->when($data['max_price'], fn ($q, $val) => $q->where('price', '<=', $val));
                }),
        ])
            ->actions([
            // Uses the EditAction imported from Filament\Actions
            EditAction::make(),
        ])
        ->bulkActions([
            BulkActionGroup::make([
                // Uses the DeleteBulkAction imported from Filament\Actions
                DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            //'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
