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
//use Filament\Schemas\Components\Section;
//use Filament\Schemas\Components\Grid; // Import the Grid
use Filament\Actions\ReplicateAction;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\RichEditor;


class PropertyResource extends Resource
{
    /**
     * This tells Filament: "This resource belongs to the Business via
     * the 'business' relationship on the Property model."
     */
    protected static ?string $tenantOwnershipRelationshipName = 'business';
    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $model = Property::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-home-modern';

    //protected static bool $isScopedToTenant = true;

    public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()
        ->whereHas('business.users', function (\Illuminate\Database\Eloquent\Builder $query) {
            $query->where('users.id', auth()->id());
        });
}

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                //\Filament\Schemas\Components\Section::make('Ownership')
                //->description('Assign this property to a business.')
                //->components([
                    //Select::make('business_id')
   // ->label('Business / Owner')
    //->relationship(
        //name: 'business',
        //titleAttribute: 'name',
        //modifyQueryUsing: fn ($query) => $query->whereHas('users', fn($q) => $q->where('users.id', auth()->id()))
    //)
    //->required()
    //->default(fn () => auth()->user()->owner_id),
                //]),
                RichEditor::make('description')
    ->label('Detailed Description')
    ->toolbarButtons([
        'bold',
        'italic',
        'bulletList',
        'orderedList',
        'link',
    ])
    ->columnSpanFull(),
                \Filament\Schemas\Components\Section::make('Property Images')
                    ->description('Upload high-quality photos')
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
                        //\Filament\Forms\Components\TextInput::make('title')->required(),
                        //\Filament\Forms\Components\TextInput::make('price')->numeric()->prefix('£')->required(),
                        //\Filament\Forms\Components\Textarea::make('address')->required()->columnSpanFull(),
                        TextInput::make('title')
    ->required()
    ->minLength(5)   // Prevents "A" or "TBC" titles
    ->maxLength(255)
    ->label('Property Title'),

TextInput::make('price')
    ->numeric()
    ->required()
    ->minValue(0)    // Prevents negative prices
    ->prefix('£')
    ->step(100)      // Optional: suggests increments of £100
    ->label('Asking Price'),

Textarea::make('address')
    ->required()
    ->maxLength(500)
    ->rows(3),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('title')->searchable()->sortable(),
            TextColumn::make('price')->money('GBP')->sortable(),
            SpatieMediaLibraryImageColumn::make('images')
                ->label('Photo')
                ->collection('property-images')
                ->conversion('thumb') // <--- This is the magic line
                ->circular(),
            ToggleColumn::make('is_published')
                ->label('Live on Site')
                ->onColor('success')
                ->offColor('danger')
                ->onIcon('heroicon-m-check')
                ->offIcon('heroicon-m-x-mark'),


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
            \Filament\Tables\Filters\TernaryFilter::make('is_published')
    ->label('Visibility')
    ->placeholder('All Properties')
    ->trueLabel('Only Published')
    ->falseLabel('Only Drafts')
    ->queries(
        true: fn (Builder $query) => $query->where('is_published', true),
        false: fn (Builder $query) => $query->where('is_published', false),
    ),
            \Filament\Tables\Filters\SelectFilter::make('business_id')
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
            ReplicateAction::make()
    ->iconButton() // Removes the text label
    ->tooltip('Duplicate')
    ->color('info')

        // Optional: clear the title so they have to give the copy a new name
        ->mutateRecordDataUsing(function (array $data): array {
            $data['title'] = $data['title'] . ' (Copy)';
            return $data;
        })
        // Redirect them to the new copy so they can tweak it immediately
        ->after(function (Property $record, ReplicateAction $action) {
            // This pulls the newly created duplicate
            $newRecord = $record->replicate();
        }),
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
