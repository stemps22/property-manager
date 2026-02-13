<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Owner;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema; // This is the core of the v5 change
use Filament\Pages\Tenancy\RegisterTenant;

class RegisterOwner extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register your business';
    }

    /**
     * This signature now matches the v5 Base Class exactly.
     * We accept a Schema, and we return a Schema.
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Company Name')
                    ->placeholder('e.g. Skyline Properties Ltd')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    protected function handleRegistration(array $data): Owner
    {
        $owner = Owner::create($data);

        $owner->users()->attach(auth()->user());

        return $owner;
    }
}
