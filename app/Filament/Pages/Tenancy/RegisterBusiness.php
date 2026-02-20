<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Business;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\RegisterTenant;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RegisterBusiness extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register Business';
    }

    /**
     * In v5, if the page is empty, it's often because the method signature
     * is missing the 'static' requirement or the specific Schema wrapper.
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Business Name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->label('Business URL Slug')
                    ->required()
                    ->readOnly()
                    ->unique(Business::class, 'slug'),
            ]);
    }
// OR use Hidden::make('slug') if you want it totally invisible
    protected function handleRegistration(array $data): Model
    {
        $business = Business::create($data);

        $business->users()->attach(auth()->user());

        return $business;
    }
}
