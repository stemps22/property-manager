<?php

namespace App\Filament\Resources\HeroSlides\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HeroSlideSchema
{
    public static function make(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Slide Content')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('subtitle')
                            ->maxLength(255),
                        FileUpload::make('image_path')
                            ->image()
                            ->directory('slides')
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->label('Slide Image'),
                        TextInput::make('link_url')
                            ->url()
                            ->label('Action URL'),
                        TextInput::make('order')
                            ->numeric()
                            ->default(0)
                            ->label('Display Order'),
                        Toggle::make('is_active')
                            ->label('Visible on Homepage')
                            ->default(true),
                    ])
            ]);
    }
}
