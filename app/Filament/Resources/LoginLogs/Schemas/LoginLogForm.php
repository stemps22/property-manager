<?php

namespace App\Filament\Resources\LoginLogs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LoginLogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('ip_address'),
                TextInput::make('user_agent'),
                DateTimePicker::make('login_at')
                    ->required(),
                DateTimePicker::make('logout_at'),
            ]);
    }
}
