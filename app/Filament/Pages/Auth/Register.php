<?php

namespace App\Filament\Pages\Auth;

use App\Models\Business;
use Filament\Auth\Pages\Register as BaseRegister;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema; // Mandatory for Filament 5 Auth pages
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Register extends BaseRegister
{
    /**
     * Filament 5 Method Signature.
     * Overriding 'form' using the 'Schema' class as required by the parent.
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                
                // The custom business field
                TextInput::make('business_name')
                    ->label('Business / Company Name')
                    ->required()
                    ->maxLength(255),
                    
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ])
            ->statePath('data');
    }

    /**
     * Logic for creating the User and Business.
     * Preserving your specific session and pivot logic.
     */
    protected function handleRegistration(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            $user = parent::handleRegistration($data);

            $business = Business::create([
                'name' => $data['business_name'],
                'slug' => Str::slug($data['business_name']),
            ]);

            $user->businesses()->attach($business);
            
            session()->put('tenant_id', $business->id);

            return $user;
        });
    }
}