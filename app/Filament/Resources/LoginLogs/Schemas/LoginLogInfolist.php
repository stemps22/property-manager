<?php

namespace App\Filament\Resources\LoginLogs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LoginLogInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label('User'),
                TextEntry::make('ip_address')
                    ->placeholder('-'),
                TextEntry::make('user_agent')
                    ->placeholder('-'),
                TextEntry::make('login_at')
                    ->dateTime(),
                TextEntry::make('logout_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
