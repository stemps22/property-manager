<?php

namespace App\Filament\Resources\LoginLogs;

/*use App\Filament\Resources\LoginLogs\Pages\CreateLoginLog;
use App\Filament\Resources\LoginLogs\Pages\EditLoginLog;
use App\Filament\Resources\LoginLogs\Pages\ListLoginLogs;
use App\Filament\Resources\LoginLogs\Pages\ViewLoginLog;
use App\Filament\Resources\LoginLogs\Schemas\LoginLogForm;
use App\Filament\Resources\LoginLogs\Schemas\LoginLogInfolist;
use App\Filament\Resources\LoginLogs\Tables\LoginLogsTable;
use App\Models\LoginLog;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;*/

use App\Filament\Resources\LoginLogs\Pages;
use App\Models\LoginLog;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LoginLogResource extends Resource
{
    //protected static ?string $model = LoginLog::class;

    //protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    //protected static ?string $navigationGroup = 'Settings';

    /**
     * Restricted visibility: Only you and the business owner can see this menu.
     */
    public static function shouldRegisterNavigation(): bool
    {
        $superAdminEmails = [
            'your-email@example.com',
            'client-owner@example.com'
        ];

        return in_array(auth()->user()->email, $superAdminEmails);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Admin User')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->copyable(),
                Tables\Columns\TextColumn::make('login_at')
                    ->label('Logged In')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('logout_at')
                    ->label('Logged Out')
                    ->dateTime()
                    ->placeholder('Active Session or Closed Browser'),
                Tables\Columns\TextColumn::make('user_agent')
                    ->label('Device/Browser')
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->user_agent),
            ])
            ->defaultSort('login_at', 'desc')
            ->actions([]) // No edit or delete actions for audit logs
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLoginLogs::route('/'),
        ];
    }
}
